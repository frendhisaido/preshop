$(document).ready(function() 
{
   $('[title]').each(function()
   {
      $(this).qtip({
          content: {
            text: $(this).attr('tooltip'),
            },
         position: {
                  corner: {
                     tooltip: 'bottomLeft',
                     target : 'topRight'
                  }
               },
          style: {
                  border: {
                     width: 5,
                     radius: 10
                  },
                  padding: 10, 
                  textAlign: 'center',
                  tip: true, 
                  name: 'green' }
 
      });
   });
});
      
$(document).ready(function() 
{
     $('img').each(function()
   {
      var content = '<img src="';
      content += $(this).attr('rel');
      content += '" width="250" height="250"/>';
      $(this).qtip(
      {
         content: content,
         position: {
            corner: {
               target: 'topRight', 
               tooltip: 'bottomLeft'
              }
         },
         style: {
            tip: true, 
            border: {
               width: 0,
               radius: 4
            },
            name: 'green', 
         }
   });
    });
 });
      