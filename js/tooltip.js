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