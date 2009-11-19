function find_me_on_ajax_saveOrder(){
	$('sortOrderData').value = Sortable.serialize("displayDiv");	
}

function selectionChanged(){


	var label = $("instruction");
	var dropdown = $("networkDropdown");
	var settingInput = $("addSettingInput");
	var addButton = $("addButton");
	
	if(dropdown.selectedIndex != 0){
		var currentSelection = dropdown.options[dropdown.selectedIndex]
		label.innerHTML = currentSelection.getAttribute('instruction');
		settingInput.value = '';
		addButton.disabled = false;
	}	
	else{
		label.innerHTML = '';
		settingInput.value = '';
		addButton.disabled = false;
	}
	
}

function selectionUpdate(){


	var label = $("url");
	var dropdown = $("configuredDropdown");
	var settingInput = $("addSettingInput");
	var addButton = $("addButton");
	
	if(dropdown.selectedIndex != 0){
		var currentSelection = dropdown.options[dropdown.selectedIndex]
		label.innerHTML = currentSelection.getAttribute('url');
		settingInput.value = '';
		addButton.disabled = false;
	}	
	else{
		label.innerHTML = '';
		settingInput.value = '';
		addButton.disabled = true;
	}
	
}

function onTextKeyDown(){
	if(event.keyCode == 13){
		find_me_on_ajax_addNetwork(
			document.getElementById('networkDropdown').selectedIndex - 1,
			document.getElementById('addSettingInput'),
			document.getElementById('responseDiv')
		);
	}
}

function onDropToTrash(){
	var span = $('trash').firstChild.nextSibling;
	if(span){
		find_me_on_ajax_delete_network(span.id.split('_')[1]);
		span.parentNode.removeChild(span);
	}
	
}

function addLoadingIcon(){
	var img = Builder.node('span',{
						id:'loadingImage',
						className:'linkWrapper',
						title:'Loading',
						style:'position:relative;'},
						Builder.node('img',{src:'../images/ajax-loader.gif',style:'margin:2px'},''));
	//console.log(img);
	$('displayDiv').appendChild(img);
}

function find_me_on_ajax_addNetwork(selectedIndex,textInput,responseDiv){
	addLoadingIcon();
 	var siteID = $('networkDropdown').options[selectedIndex].value;
 	var mysack = new sack(getWordpressBaseLocation()+"wp-admin/admin-ajax.php" );    
	
	//console.log('Adding network '+siteID+ ': '+textInput);
	
	mysack.execute = 1;
	mysack.method = 'POST';
	mysack.setVar( "action", "find_me_on_add_network" );
	mysack.setVar( "siteID", siteID );
	mysack.setVar( "value", textInput.value );
	mysack.encVar( "cookie", document.cookie, false );
	mysack.onError = function() { alert('Ajax error while adding new network' )};
	mysack.runAJAX();
	
	
  	return true;

}

function find_me_on_ajax_delete_network(linkId){
	
	var mysack = new sack(getWordpressBaseLocation()+"wp-admin/admin-ajax.php" );    
	
	mysack.execute = 1;
	mysack.method = 'POST';
	mysack.setVar( "action", "find_me_on_delete_network" );
	mysack.setVar( "linkId", linkId );
	mysack.encVar( "cookie", document.cookie, false );
	mysack.onError = function() { alert('Ajax error while adding new network' )};
	
	mysack.runAJAX();
	
	createSortables();
	
	return true;
}

function createSortables(){
	Sortable.destroy('displayDiv');
	Sortable.destroy('trash');

	targets = $$('.drop_target');
		Sortable.create('trash',{tag:'span',containment:targets,constraint:false,dropOnEmpty:true,
		onUpdate: function(){
			onDropToTrash();
		}
	});
	Sortable.create('displayDiv',{tag:'span',containment:targets,overlap:'horizontal',constraint:false});

}

function getWordpressBaseLocation(){
	return $('callBackUrl').value.split('wp-content/')[0];
}

function changeDivContent( nameOfDiv, newContent )
{
	var div = document.getElementById( nameOfDiv );
if( div )
{
	div.innerHTML = newContent;
}
}
   
jQuery(document).ready(function() {
	if (jQuery('#iconator')) jQuery('#findmeon-networks').sortable({ 
	delay:        250,
	cursor:      'move',
	scroll:       true,
	revert:       true, 
	opacity:      0.7
});
	if (jQuery('#findmeon-bookmarks')) { jQuery('#findmeon-sortables').sortable({ 
	handle:      '.box-mid-head',
	delay:        250,
	cursor:      'move',
	scroll:       true,
	revert:       true, 
	opacity:      0.7
});

// Check for Tumblr and alert of changes
// then remove completely after accepted
if (jQuery('#findmeon-tumblr').is(':checked')) {
	jQuery('label.findmeon-tumblr').css('background-color', '#df6f6f');
	jQuery('#findmeon-tumblr').removeAttr('checked');
}
else if (jQuery('#findmeon-tumblr').is(':not(:checked)')) {
	jQuery('label.findmeon-tumblr').css('display', 'none');
}


jQuery('#info-manual').css({ display: 'none' });
jQuery('#clear-warning').css({ display:'none' });
jQuery('#custom-warning').css({ display:'none' });
jQuery('#custom-warning-a').css({ display:'none' });
jQuery('#mobile-warn').css({ display:'none' });


if (jQuery('#autocenter-no').is(':not(:checked)')) {
	this.checked=jQuery('#xtrastyle').attr('disabled', true);
	this.checked=jQuery('#xtrastyle').val('Custom CSS has been disabled because you are using either the "Auto Space" or "Auto Center" option above.');
}

jQuery('#autocenter-yes').click(function() {
	this.checked=jQuery('#custom-warning').fadeIn('fast');
	this.checked=jQuery(this).is(':not(:checked)');
});
jQuery('#autospace-yes').click(function() {
	this.checked=jQuery('#custom-warning-a').fadeIn('fast');
	this.checked=jQuery(this).is(':not(:checked)');
});

jQuery('#custom-warn-yes').click(function() {
	this.checked=jQuery('#custom-warning').fadeOut();
	this.checked=jQuery('#autocenter-yes').attr('checked', 'checked');
	this.checked=jQuery('#xtrastyle').attr('disabled', true);
	this.checked=jQuery('#xtrastyle').val('Custom CSS has been disabled because you are using either the "Auto Space" or "Auto Center" option above.');
	this.checked=jQuery(this).is(':not(:checked)');
});
jQuery('#custom-warn-yes-a').click(function() {
	this.checked=jQuery('#custom-warning-a').fadeOut();
	this.checked=jQuery('#autospace-yes').attr('checked', 'checked');
	this.checked=jQuery('#xtrastyle').attr('disabled', true);
	this.checked=jQuery('#xtrastyle').val('Custom CSS has been disabled because you are using either the "Auto Space" or "Auto Center" option above.');
	this.checked=jQuery(this).is(':not(:checked)');
});



jQuery('#autocenter-no').click(function() {
	this.checked=jQuery('#xtrastyle').removeAttr('disabled');
	this.checked=jQuery('#xtrastyle').val('margin:20px 0 0 0 !important;\npadding:25px 0 0 10px !important;\nheight:29px;/*the height of the icons (29px)*/\ndisplay:block !important;\nclear:both !important;');
});



jQuery('.toggle').click(function(){
	var id = jQuery(this).attr('id');
	jQuery('#tog'+ id).slideToggle('slow');

	if (jQuery('#'+ id + ' img.close').is(':hidden')){
		jQuery('#'+ id +' img.close').show();
		jQuery('#'+ id +' img.open').fadeOut();
	} else {
		jQuery('#'+ id + ' img.open').show();
		jQuery('#'+ id + ' img.close').fadeOut();
	}
});



// Apply "smart options" to BG image
jQuery('#bgimg-yes').click(function() {
	jQuery('#bgimgs').toggleClass('hidden').toggleClass('');
});


// Apply "smart options" to Yahoo! Buzz
if (jQuery('#findmeon-yahoobuzz').is(':checked')) {
	jQuery('#ybuzz-defaults').is(':visible');
}
else if (jQuery('#findmeon-yahoobuzz').is(':not(:checked)')) {
	jQuery('#ybuzz-defaults').is(':hidden');
}
jQuery('#findmeon-yahoobuzz').click(function() {
	if (this.checked) {
		this.checked=jQuery('#ybuzz-defaults').fadeIn('fast');
	}
	else {
		jQuery('#ybuzz-defaults').fadeOut();
	}
});

// Apply "smart options" to Twittley
if (jQuery('#findmeon-twittley').is(':checked')) {
	jQuery('#twittley-defaults').is(':visible');
}
else if (jQuery('#findmeon-twittley').is(':not(:checked)')) {
	jQuery('#twittley-defaults').is(':hidden');
}
jQuery('#findmeon-twittley').click(function() {
	if (this.checked) {
		this.checked=jQuery('#twittley-defaults').fadeIn('fast');
	}
	else {
		jQuery('#twittley-defaults').fadeOut();
	}
});

// Apply "smart options" to Twitter
if (jQuery('#findmeon-twitter').is(':checked')) {
	jQuery('#twitter-defaults').is(':visible');
}
else if (jQuery('#findmeon-twitter').is(':not(:checked)')) {
	jQuery('#twitter-defaults').is(':hidden');
}
jQuery('#findmeon-twitter').click(function() {
	if (this.checked) {
		this.checked=jQuery('#twitter-defaults').fadeIn('fast');
	}
	else {
		jQuery('#twitter-defaults').fadeOut();
	}
});


// Apply "smart options" to bit.ly DIV
jQuery('#shorty').click(function() {
	if (jQuery("#shorty option[value='bitly']").is(':selected')) {
		jQuery('#shortyapimdiv-bitly').fadeIn('fast');
	}
	else {
		jQuery('#shortyapimdiv-bitly').fadeOut('fast');
	}
});


// Fade in/out mobile feature warning
jQuery('#mobile-hide').click(function() {
	if (this.checked) {
		this.checked=jQuery('#mobile-warn').fadeIn('fast');
	}
	else {
		jQuery('#mobile-warn').fadeOut();
	}
});


jQuery('#position-above').click(function() {
	if (jQuery('#info-manual').is(':visible')) {
		this.checked=jQuery('#info-manual').fadeOut();
	}
});

jQuery('#position-below').click(function() {
	if (jQuery('#info-manual').is(':visible')) {
		this.checked=jQuery('#info-manual').fadeOut();
	}
});

jQuery('#position-manual').click(function() {
	if (jQuery('#info-manual').is(':not(:visible)')) {
		this.checked=jQuery('#info-manual').fadeIn('slow');
	}
});

jQuery('.dtags-info').click(function() {
	jQuery('#tag-info').fadeIn('fast');
});

jQuery('.dtags-close').click(function() {
	jQuery('#tag-info').fadeOut();
});

jQuery('.shebang-info').click(function() {
	jQuery('#info-manual').fadeIn('fast');
});

jQuery('.boxcloser').click(function() {
	jQuery('.findmeon-donation-box').slideUp('slow');
});

jQuery('#yourversion .del-x').click(function() {
	jQuery('#yourversion').fadeOut();
});

jQuery('div#errmessage img.del-x').click(function() {
	jQuery('div#errmessage').fadeOut();
});

jQuery('div#warnmessage img.del-x').click(function() {
	jQuery('div#warnmessage').fadeOut();
});

jQuery('div#statmessage img.del-x').click(function() {
	jQuery('div#statmessage').fadeOut();
});

jQuery('div#clearurl img.del-x').click(function() {
	jQuery('div#clearurl').fadeOut();
});

jQuery('#info-manual img.del-x').click(function() {
	jQuery('#info-manual').fadeOut();
});

jQuery('#mobile-warn img.del-x').click(function() {
	jQuery('#mobile-warn').fadeOut();
});




jQuery('#clearShortUrls').click(function() {
    if (jQuery('#clearShortUrls').is(':checked')) {
        this.checked=jQuery('#clear-warning').fadeIn('fast');
    }else{
        this.checked=jQuery(this).is(':not(:checked)');
    }
    this.checked=jQuery(this).is(':not(:checked)');
});



jQuery('#warn-cancel').click(function() {
	this.checked=jQuery('#clear-warning').fadeOut();
	this.checked=jQuery(this).is(':not(:checked)');
});

jQuery('#warn-yes').click(function() {
	this.checked=jQuery('#clear-warning').fadeOut();
	this.checked=jQuery('#clearShortUrls').attr('checked', 'checked');
	this.checked=!this.checked;
});

}});

/***********************************************
* Dynamic Ajax Content- © Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
***********************************************/

var bustcachevar=1 //bust potential caching of external pages after initial request? (1=yes, 0=no)
var loadedobjects=""
var rootdomain="http://"+window.location.hostname
var bustcacheparameter=""

function ajaxpage(url, containerid){
var page_request = false
if (window.XMLHttpRequest) // if Mozilla, Safari etc
page_request = new XMLHttpRequest()
else if (window.ActiveXObject){ // if IE
try {
page_request = new ActiveXObject("Msxml2.XMLHTTP")
} 
catch (e){
try{
page_request = new ActiveXObject("Microsoft.XMLHTTP")
}
catch (e){}
}
}
else
return false
page_request.onreadystatechange=function(){
loadpage(page_request, containerid)
}
if (bustcachevar) //if bust caching of external page
bustcacheparameter=(url.indexOf("?")!=-1)? "&"+new Date().getTime() : "?"+new Date().getTime()
page_request.open('GET', url+bustcacheparameter, true)
page_request.send(null)
}

function loadpage(page_request, containerid){
if (page_request.readyState == 4 && (page_request.status==200 || window.location.href.indexOf("http")==-1))
document.getElementById(containerid).innerHTML=page_request.responseText
}

function loadobjs(){
if (!document.getElementById)
return
for (i=0; i<arguments.length; i++){
var file=arguments[i]
var fileref=""
if (loadedobjects.indexOf(file)==-1){ //Check to see if this object has not already been added to page before proceeding
if (file.indexOf(".js")!=-1){ //If object is a js file
fileref=document.createElement('script')
fileref.setAttribute("type","text/javascript");
fileref.setAttribute("src", file);
}
else if (file.indexOf(".css")!=-1){ //If object is a css file
fileref=document.createElement("link")
fileref.setAttribute("rel", "stylesheet");
fileref.setAttribute("type", "text/css");
fileref.setAttribute("href", file);
}
}
if (fileref!=""){
document.getElementsByTagName("head").item(0).appendChild(fileref)
loadedobjects+=file+" " //Remember this object as being already added to page
}
}
}
