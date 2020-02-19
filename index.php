<!DOCTYPE html>
<html lang="en">
	<head>
		<!--
		replace XXX_description_XXX by final description text
		replace XXX_url_XXX by final production URL
		replace XXX_thumb_XXX by final production URL of the thumb image for social networks
		-->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>RegalTabs & RegalAccordion</title>
		<meta name="description" content="Les constructeurs Javascript Vanilla RegalTabs et RegalAccordion fonctionnent bien ensemble.">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" type="image/png" href="favicon.png">
		<link href="css/styles.css" rel="stylesheet" type="text/css">
		
		<meta property="og:url" content="http://www.regaloeb.com/pages/regal-tabs-accordion-vanilla">
		<meta property="og:title" content="RegalTabs & RegalAccordion">
		<meta property="og:description" content="Les constructeurs Javascript Vanilla RegalTabs et RegalAccordion fonctionnent bien ensemble.">
		<meta property="og:image" content="http://www.regaloeb.com/pages/regal-tabs-accordion-vanilla/fb-thumb.png">
		<meta property="og:site_name" content="regaloeb.com">
		<meta property="og:type" content="website">
		<meta property="fb:admins" content="595624305">
		<meta property="fb:app_id" content="217293022051519">
		
		<link rel="canonical" href="http://www.regaloeb.com/pages/regal-tabs-accordion-vanilla">
	</head>
	<body>
		<main class="page-content">
			
			<div class="section-inner">
				<h1>RegalTabs & RegalAccordion</h1>
				<p>
					Si on veut des onglets en mode desktop et des accordéons en mode mobile, la solution consiste à charger les deux constructeurs <strong>Javascript Vanilla</strong> <a href="http://www.regaloeb.com/pages/regal-tabs-vanilla.js">RegalTab</a> et <a href="http://www.regaloeb.com/pages/regal-accordion-vanilla.js">RegalAccordion</a>, à appliquer une structure HTML adéquate et à déclarer les objets en fonction du contexte mobile/desktop.<br>
					Certes, c'est un peu tordu mais cela fonctionne parfaitement&nbsp;!<br><br>
					<a href="https://github.com/regaloeb/regal-tabs-accordion-vanilla" target="_blank" class="picto-link"><span class="picto"> <svg class="octicon octicon-mark-github v-align-middle" height="32" viewBox="0 0 16 16" version="1.1" width="32" aria-hidden="true"><path fill-rule="evenodd" d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0016 8c0-4.42-3.58-8-8-8z"/></svg>
</span><span>Github repository</span></a>
				</p>
				<h2>HTML</h2>
				<p>
					Conteneur principal avec classes <strong>.tabs</strong> et <strong>.tabs-accordion</strong><br>
					Attribut <strong>data-active</strong> détermine l'onglet affiché par défaut&nbsp;: "0": le premier, "1": le deuxième, etc.<br>
					Avec la classe <strong>.vertical</strong> la navigation Onglets sera placée à gauche des onglets, les liens les uns en dessous des autres..<br>
					Avec la classe <strong>.horizontal</strong> la navigation Onglets sera placée au dessus des onglets, les liens les uns à côté des autres..<br>
					Pour les mobiles, la navigation est toujours au dessus des onglets et les liens sont placés les uns sous les autres.<br>
					&nbsp;&nbsp;&nbsp;&nbsp;Un enfant avec classe <strong>.tabs-nav</strong>.<br>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Chaque enfant de ce bloc .tabs-nav est un lien vers un onglet et doit avoir la classe <strong>.tabs-nav-item</strong>.&nbsp;:<br>
					&nbsp;&nbsp;&nbsp;&nbsp;Un enfant avec classes <strong>.tabs-cont</strong> et <strong>.accordion-mobile</strong> qui va contenir les onglets et l'accordéon.<br>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Chaque onglet doit avoir la classe <strong>.tab</strong>, contenir un enfant <strong>.open-close</strong> (pour des raisons d'accessibilité, on choisira une balise titre <strong>&lt;hN></strong>) avec le même titre que celui de la nav-tab correspondante et qui va servir pour ouvrir/fermer l'accordéon.<br>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Le contenu de l'onglet (et de l'accordéon du coup) doit être placé dans un container <strong>.desc-cont</strong> lui-même contenu dans un <strong>.accordion-desc</strong>.
					<span class="code">
&lt;div class="<strong>tabs tabs-accordion</strong> vertical" data-active="0">
&nbsp;&nbsp;&nbsp;&nbsp;&lt;nav class="<strong>tabs-nav</strong>">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;a <strong>href="#tab1"</strong> class="<strong>tabs-nav-item</strong>">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;span>Onglet 1&lt;/span>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;...etc...
&nbsp;&nbsp;&nbsp;&nbsp;&lt;/nav>
&nbsp;&nbsp;&nbsp;&nbsp;&lt;div class="<strong>tabs-cont accordion-mobile</strong>" data-default="closed">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;div <strong>id="tab1"</strong> class="<strong>tab</strong>">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;<strong>h2</strong> class="<strong>open-close</strong>">&lt;span>Onglet 1&lt;/span>&lt;/h2>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;div class="<strong>accordion-desc</strong>">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;div class="<strong>desc-cont</strong>">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Contenu onglet 1
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/div>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/div>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/div>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;...etc...
&nbsp;&nbsp;&nbsp;&nbsp;&lt;/div>
&lt;/div>
					</span>
					L'attribut <strong>href</strong> des <strong>.tabs-nav-item</strong> doit contenir un lien vers l'id de l'onglet correspondant sous forme d'ancre. Il permet au javascript de retrouver l'onglet correspondant et aux utilisateurs non-javascript d'aller vers l'onglet directement.<br><br>
					Comme la navigation contenant les titres des onglets est dans un bloc séparé des onglets, pour des raisons d'accessibilité, on appliquera le style <strong>.open-close</strong> utilisé par l'accordéon à des des balise <strong>&lt;hN></strong> dans les onglets.
				</p>
				
				<h2>CSS</h2>
				<p>
					La CSS de base contient tout ce qu'il faut au niveau fonctionnel pour Onglets et Accordéons.<br>
					Cependant, l'habillage graphique sera à ajouter pour chaque cas.<br>
					SCSS: <a href="scss/components/_tabs.scss" download>scss/components/_tabs.scss</a>
				</p>
				
				<h2>JAVASCRIPT</h2>
				
				<ul class="bullets bullets-links">
					<li><a href="js/regal-tabs-vanilla.js" download>js/regal-tabs-vanilla.js</a><br></li>
					<li><a href="js/regal-accordion-vanilla.js" download>js/regal-accordion-vanilla.js</a><br></li>
					<li><a href="js/regal-tabs-accordion-declaration.js" download>js/regal-tabs-accordion-declaration.js.js</a></li>
				</ul>
				<p>
					Inclure les constructeurs en bas de page avant la fermeture du body&nbsp;:
					<span class="code">
&lt;script src="js/regal-tabs-vanilla.js">&lt;/script>
&lt;script src="js/regal-accordion-vanilla.js">&lt;/script>
					</span>
					Puis initialiser ou détruire les objets RegalAccordion et RegalTab selon le contexte desktop/mobile au chargement de la page et en fin de resize de fenêtre&nbsp;:
					<span class="code">
var tabsAccordion = document.querySelectorAll('.tabs-accordion');
if(tabsAccordion.length){
&nbsp;&nbsp;&nbsp;&nbsp;var accordionMobile = document.querySelectorAll('.accordion-mobile');
&nbsp;&nbsp;&nbsp;&nbsp;var tabs = document.querySelectorAll('.tabs');
&nbsp;&nbsp;&nbsp;&nbsp;function initAccordionTab(){
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>if(isMobileContext){</strong>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if(tabs){
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;tabs.forEach(function(elt){
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if(elt.tab){
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>elt.tab.destroy();
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;elt.tab = false;</strong>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;});
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if(accordionMobile){
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;accordionMobile.forEach(function(elt){
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;elt.style.minHeight = '0px';
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if(!elt.accordion){
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>elt.accordion = new RegalAccordion(elt);</strong>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;});
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;else{
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if(accordionMobile){
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;accordionMobile.forEach(function(elt){
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if(elt.accordion){
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>elt.accordion.destroy();
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;elt.accordion = false;</strong>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;});
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if(tabs){
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;tabs.forEach(function(elt){
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if(!elt.tab){
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;elt.tab = new RegalTabs(elt);
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;});
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}
&nbsp;&nbsp;&nbsp;&nbsp;};
&nbsp;&nbsp;&nbsp;&nbsp;<strong>initAccordionTab();
&nbsp;&nbsp;&nbsp;&nbsp;window.addEventListener('resizeEnd', function() {
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;initAccordionTab();
&nbsp;&nbsp;&nbsp;&nbsp;});</strong>
}
					</span>
					On stocke les objet RegalTab et regalAccordion dans les éléments HTML (<strong>elt.tab</strong> et <strong>elt.acc</strong>) de façon à pouvoir faire appel aux méthodes publiques des constructeurs.
				</p>
				<p>
					<strong>NOTA IMPORTANTA&nbsp;:</strong><br>
					Il faut ajouter quelques POLYFILLS/fonctions avant la déclaration des objets&nbsp;:<br>
					- forEach pour HTMLCollection;<br>
					- triggerevent;<br>
					- resizeEnd.<br>
					Et déclarer quelques variables&nbsp;: windowHeight, windowWidth, mobileLimit, desktopLimit et isMobileContext.<br>
					Généralement, j'ai tout un tas de petites fonctions/variables de ce genre déclarées dans le fichier general.js du projet et qui me sont indispensables, j'en parle dans un <a href="http://regaloeb.com/pages/regal-snippets-vanilla/">autre article</a>.
				</p>
			</div>
		
			<section class="section tabs-demo" style="margin-bottom: 3rem;">
				<div class="section-inner">
					<h2>Démo</h2>
					<div class="tabs tabs-accordion horizontal" data-active="1"> <!-- class horizontal/vertical, data-default=indice onglet actif par défaut -->
						<nav class="tabs-nav">
							<a href="#tab1" class="tabs-nav-item">
								<span>Onglet 1</span>
							</a>
							<a href="#tab2" class="tabs-nav-item">
								<span>Onglet 2</span>
							</a>
							<a href="#tab3" class="tabs-nav-item">
								<span>Onglet 3</span>
							</a>
						</nav>
						<div class="tabs-cont accordion-mobile" data-default="closed">
							<div id="tab1" class="tab">
								<h2 class="open-close"><span>Onglet 1</span></h2>
								<div class="accordion-desc">
									<div class="desc-cont">
										<strong>Contenu onglet 1</strong><br>
										<p>
											Wisi iudico cu his, ei choro solet semper eam. Utinam detracto abhorreant his et, sit cu esse dolor perpetua. Id consetetur voluptatibus vim. Movet pertinax vulputate vim eu. Te mea apeirian deterruisset.
										</p>
										<p>
											Ea bonorum oporteat insolens duo, quodsi dignissim eu vis, ei adhuc probatus vix. Solum verear mediocrem per ei, at sed autem disputando. Enim omnes te sit, menandri expetenda cotidieque mel ei, sit nusquam persequeris interpretaris cu. Debet vulputate instructior mea te, cum no doctus deleniti. Nec in persecuti cotidieque, ei saepe explicari accusamus quo, solet maiorum iudicabit no vix. Quo ne animal partiendo tincidunt, animal voluptua scribentur ut vix.
										</p>
										<p>
											Eos in labore salutatus voluptaria, habeo inciderint ad has, ei vix dignissim consetetur scripserit. Eirmod efficiendi eos in, quas dolorem cu vim. Oporteat temporibus nam an, sed at accusata quaerendum persequeris. Ea vero menandri constituto sit, no vim graece oblique. No alii praesent sea.
										</p>
									</div>
								</div>
							</div>
							<div id="tab2" class="tab">
								<h2 class="open-close"><span>Onglet 2</span></h2>
								<div class="accordion-desc">
									<div class="desc-cont">
										<strong>Contenu onglet 2</strong><br>
										<p>
											Ad vix liber facete. Meis voluptaria instructior an ius, cu meis aliquam dignissim has, ius ad posse viris conclusionemque. Eam modo quot ex. Eam legere eripuit indoctum ex, ei everti equidem vituperata his, et enim oporteat perpetua qui. Ex nisl decore philosophia est, dicunt eripuit has ad, tamquam delicata mediocritatem vim te. Eu aliquam dissentiet adversarium mei, facer zril timeam vim at, in cum purto euripidis adversarium. Hinc semper ponderum mel id, id eos quod dicant suavitate, ad brute iisque pro.
										</p>
										<p>
											EDolorum accusamus laboramus has at, ius sale interesset ad. Cu nam everti feugiat, cum ea ludus suavitate dissentiunt. Duo ei agam reformidans, ius an probo quodsi, docendi fastidii verterem has ea. Ex stet impetus pertinax quo, agam dictas suscipiantur an qui. In pro salutatus cotidieque, vix ut sumo pericula corrumpit, et nam idque movet decore.
										</p>
										<p>
											Vero ludus no mei. Vix no meis reprimique, an has viderer quaeque, debet molestiae dissentiet vim an. Vocent patrioque ad mei, legere omnium at vel. Ei error ignota mea, mel ei timeam petentium gloriatur. Has essent nusquam ex, an ullum tritani alienum mei, enim animal insolens ne sed. Probo iuvaret scribentur eos at, eum eu mazim harum noluisse.
										</p>
									</div>
								</div>
							</div>
							<div id="tab3" class="tab">
								<h2 class="open-close"><span>Onglet 3</span></h2>
								<div class="accordion-desc">
									<div class="desc-cont">
										<strong>Contenu onglet 3</strong><br>
										<p>
											In sit agam vocibus maiestatis, cum agam admodum quaerendum eu. Duo esse petentium eu. Id prompta feugait consequat per, ius ea audire commune, aliquam tibique necessitatibus te eos. Pro idque dicit paulo no, sanctus reprimique duo eu. No movet tantas virtute cum, omnium recteque ut qui.
										</p>
										<p>
											At munere alienum vim, id vis vide assentior maiestatis, id vel aliquip consulatu. Eos ei noluisse torquatos, est solum nemore no. Has dicant dolorem vulputate ad, cum ei rebum alterum, libris pertinax eu vix. An vix case minimum inimicus, sea harum denique efficiantur ea, eum quodsi platonem persequeris at.
										</p>
										<p>
											Pri graece audiam in, in eos audiam latine iuvaret, mundi legimus te pro. Ex quas mucius dolorem est. Omnis omittantur eam no, an nam appareat dissentias. Sed id noster regione repudiandae, augue veniam decore eos an. Agam soluta nusquam cu vim, eu liber mucius timeam vim. Nec ea inermis fastidii efficiendi. Vel quis patrioque inciderint id, quando alienum sadipscing no sea, eum option viderer no.
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			
		</main>
		<script src="js/regal-accordion-vanilla.js"></script>
		<script src="js/regal-tabs-vanilla.js"></script>
		<script>
			//-------------- POLYFILLS
			//forEach NodeList & HTMLCollection polyfill 
			NodeList.prototype.forEach||(NodeList.prototype.forEach=Array.prototype.forEach),HTMLCollection.prototype.forEach||(HTMLCollection.prototype.forEach=Array.prototype.forEach);
			//triggerEvent
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
			}
			//wait until resize is done
			window.addEventListener('resize', function() {
				if(this.resizeTO) clearTimeout(this.resizeTO);
				this.resizeTO = setTimeout(function() { 
					triggerEvent(this, 'resizeEnd');
				}, 500);
			});
	
			var w = window,
				d = document,
				e = d.documentElement,
				g = d.getElementsByTagName('body')[0];

			var windowHeight = w.innerHeight||e.clientHeight||g.clientHeight;
			var windowWidth = w.innerWidth||e.clientWidth||g.clientWidth;
			var mobileLimit = 650;
			var desktopLimit = 1024;
			var isMobileContext = (windowWidth > mobileLimit) ? false : true;
			window.addEventListener('resizeEnd', function() {
				windowHeight = w.innerHeight||e.clientHeight||g.clientHeight;
				windowWidth = w.innerWidth||e.clientWidth||g.clientWidth;
				isMobileContext = (windowWidth > mobileLimit) ? false : true;
			});
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
		</script>
	</body>
</html>