//onglets ou accordion selon contexte mobile/desktop
var tabsAccordion = document.querySelectorAll('.tabs-accordion');
if(tabsAccordion.length){
	var accordionMobile = document.querySelectorAll('.accordion-mobile');
	var tabs = document.querySelectorAll('.tabs');
	function initAccordionTab(){
		if(isMobileContext){
			if(tabs){
				tabs.forEach(function(elt){
					if(elt.tab){
						elt.tab.destroy();
						elt.tab = false;
					}
				});
			}
			if(accordionMobile){
				accordionMobile.forEach(function(elt){
					elt.style.minHeight = '0px';
					if(!elt.accordion){
						elt.accordion = new RegalAccordion(elt);
					}
				});
			}
		}
		else{
			if(accordionMobile){
				accordionMobile.forEach(function(elt){
					if(elt.accordion){
						elt.accordion.destroy();
						elt.accordion = false;
					}
				});
			}
			if(tabs){
				tabs.forEach(function(elt){
					if(!elt.tab){
						elt.tab = new RegalTabs(elt);
					}
				});
			}
		}
	};
	initAccordionTab();
	window.addEventListener('resizeEnd', function() {
		initAccordionTab();
	});
}