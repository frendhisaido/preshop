jQuery(function (){
	 
        $('a.tanya_belanja').click(function() {
            var url = this.href;
	    var barang = this.rel; 
	    var id = this.id;
            var dialog = $('<div style="display:hidden" title="Tambahkan '+barang+'"><img src=""></div>').appendTo('body');
            // load remote content
            dialog.load(
                url, 
                {},
                function (responseText, textStatus, XMLHttpRequest) {
                    dialog.dialog({
                    draggable:false,
                    resizable: false,  
		    modal: true,  
		    width: 400,  
		    height: 350, 
		    hide: 'puff',
		    show: 'fade',
		    buttons: {
						"Tambahkan": function() {
						        ngajax(id); 
							$(this).dialog("close"); 
						}, 
						"Batal": function() { 
							$(this).dialog("close"); 
						} 
					}
 
                    });
                }
            );
            //prevent the browser to follow the link
            return false;
        });
    });
    

 
function ngajax(id) {
   form =  $('#tambah_barang'+id+'');
   $.ajax({
   url: form.attr('action'),
   data: form.serialize(),
   type: (form.attr('method')),
   cache: false,	  
   dataType: 'script',
   success: function(data) {
   $('#pesan').html('<p>'+data+'</p>');	  
  }
 });
}