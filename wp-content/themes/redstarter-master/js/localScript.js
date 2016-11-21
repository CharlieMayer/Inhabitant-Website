console.log(monkey.blogName);
console.log(monkey.rest_url);
console.log(monkey.security_token);

jQuery(document).ready(function($){

$.ajax({
  url: monkey.rest_url + "wp/v2/posts/",

   method: 'GET',
  }).done(function(data) {
console.log(data)
  
      }).fail(function(err) {
        throw err;
      });

      });
