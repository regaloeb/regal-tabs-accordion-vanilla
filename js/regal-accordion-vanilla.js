var RegalAccordion = function(selector, options){
	var plugin = this;
	plugin.el = (typeof(selector) === 'object') ? selector : (selector.indexOf('#') >= 0) ? document.getElementById(selector.replace('#', '')) : document.querySelector(selector);
	
	var defaults = {
		end: (plugin.el.getAttribute('data-end') && plugin.el.getAttribute('data-end') !== '') ? plugin.el.getAttribute('data-end') : 2 ,
		start: (plugin.el.getAttribute('data-start') && plugin.el.getAttribute('data-start') !== '') ? plugin.el.getAttribute('data-start') : 0
	};
	if (typeof Object.assign != 'function') {
	  Object.assign = function(target, varArgs) { // .length of function is 2
		'use strict';
		if (target == null) { // TypeError if undefined or null
		  throw new TypeError('Cannot convert undefined or null to object');
		}
		var to = Object(target);
		for (var index = 1; index < arguments.length; index++) {
		  var nextSource = arguments[index];
		  if (nextSource != null) { // Skip over if undefined or null
			for (var nextKey in nextSource) {
			  // Avoid bugs when hasOwnProperty is shadowed
			  if (Object.prototype.hasOwnProperty.call(nextSource, nextKey)) {
				to[nextKey] = nextSource[nextKey];
			  }
			}
		  }
		}
		return to;
	  };
	}
	plugin.o = Object.assign({}, defaults, options);
	
	var elt = plugin.el;
	var desc = elt.querySelectorAll('.accordion-desc');
	var op = elt.querySelectorAll('.open-close');
	var onlyOne = elt.getAttribute('data-only-one');
	//Open accordion by anchor in location
	var reqId = window.location.hash.replace('#', '');
	var reqEl = (reqId !== '') ? document.getElementById(reqId) : false;
	if(reqEl){
		//make sure reqEl is inside the RegalAccordion
		reqEl = elt.contains(document.getElementById(reqId)) ? document.getElementById(reqId) : false
		//avoid scroll to anchor for accordions
        window.scrollTo(0, 0);         // execute it straight away
        setTimeout(function() {
            window.scrollTo(0, 0);     // run it a bit later also for browser compatibility
        }, 1);
	}
	
	if(onlyOne){
		op.forEach(function(el){
			el.setAttribute('data-only-one', onlyOne);
		});
	}
	//open-close action
	op.forEach(function(el){
		el.addEventListener('click', openClose);
	});
	function openClose(e){
		e.preventDefault();
		var d = e.currentTarget.parentNode.querySelector('.accordion-desc');
		var onlyone = e.currentTarget.getAttribute('data-only-one');
		if(e.currentTarget.classList.contains('js-closed')){
			if(onlyone === 'true'){
				var toclose = elt.querySelector('.open-close.js-opened');
				if(toclose){
					triggerEvent(toclose, 'click');
				}
			}
			slideDown(d);
			e.currentTarget.classList.add('js-opened');
			e.currentTarget.classList.remove('js-closed');
		}
		else{
			slideUp(d);
			e.currentTarget.classList.remove('js-opened');
			e.currentTarget.classList.add('js-closed');
		}
	};
	//default state
	function setDefaultState(){
		var defaultState = elt.getAttribute('data-default');
		if(defaultState == 'closed'){
			op.forEach(function(el){
				el.classList.add('js-closed');
			});
			desc.forEach(function(el){
				slideUp(el);
			});
			//on ouvre le volet data-default="open" sauf si il y a une ancre valide
			var defopened;
			if(reqEl){ 
				if(reqEl.classList.contains('open-close')){
					defopened = reqEl;
				}
				else{
					defopened = reqEl.querySelector('.open-close.js-closed') || reqEl.closest('.accordion-desc').parentNode.querySelector('.open-close.js-closed') || false;
				}
			}
			else{
				defopened = elt.querySelector('.open-close[data-default=open]');
			}
			if(defopened){
				triggerEvent(defopened, 'click');
			}
		}
		else{
			op.forEach(function(el){
				el.classList.add('js-opened');
			});
			desc.forEach(function(el){
				slideDown(el);
			});
		}
	};
	setDefaultState();
	function windowLoad(){
		setTimeout(function(){
			//to make sure everything is loaded, especially images
			resizeOpenedOnes();
		}, 500);
	};
	window.addEventListener('load', windowLoad);
	//eventListeners
	//wait until resize is done
	window.addEventListener('resize', function() {
		if(this.resizeTO) clearTimeout(this.resizeTO);
		this.resizeTO = setTimeout(function() { 
			triggerEvent(this, 'resizeEnd');
		}, 500);
	});
	//resize
	function resizeOpenedOnes(){
		op.forEach(function(el){
			if(el.classList.contains('js-opened')){
				var d = el.parentNode.querySelector('.accordion-desc');
				slideDown(d);
			}
		});
	};
	function resize(){
		resizeOpenedOnes();
	};
	window.addEventListener('resizeEnd', resize);
	function slideDown(elem) {
		var h = 0;
		elem.children.forEach(function(elt){
			h = h + elt.getBoundingClientRect().height;
		});
		elem.style.maxHeight = h + 'px';
	};
	function slideUp(elem) {
		elem.style.maxHeight = '0';
	};
	function triggerEvent(el, type){
	   if ('createEvent' in document) {
			var e = document.createEvent('HTMLEvents');
			e.initEvent(type, false, true);
			el.dispatchEvent(e);
		}
		else {
			var e = document.createEventObject();
			e.eventType = type;
			el.fireEvent('on' + e.eventType, e);
		}
	};
	plugin.destroy = function(){
		op.forEach(function(el){
			el.removeEventListener('click', openClose);
			el.classList.add('js-closed');
			el.classList.remove('js-opened');
		});
		desc.forEach(function(el){
			el.style.maxHeight = '100000000px';
		});
	};
	plugin.slideDown = function(elem){
		slideDown(elem);
	};
	return plugin;
};