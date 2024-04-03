// (function($){


//     $(document).ready(function(){
//         $(document).on('click', '.js-filter-item > a', function(e){
//             e.preventDefault();

//             var category = $(this).data('category');

//             $.ajax({
//                 url: wp_ajax.ajax_url,
//                 data: {action: 'filter', category: category},
//                 type: 'post',
//                 success: function(result) {
//                     $('.d_articles-item-list').html(result);
//                 },
//                 error: function(result) {
//                     console.warn(result);
//                 }

//             });
//         });
//     });





// })(jQuery);


jQuery( function( $ ){
	$( '#filter' ).submit(function(){
		var filter = $(this);
		$.ajax({
			url : true_obj.ajaxurl, // обработчик
			data : filter.serialize(), // данные
			type : 'POST', // тип запроса
			beforeSend : function( xhr ){
				filter.find( 'button' ).text( 'Загружаю...' ); // изменяем текст кнопки
			},
			success : function( data ){
				filter.find( 'button' ).text( 'Фильтровать' ); // возвращаеи текст кнопки
				$( '#response' ).html(data);
			}
		});
		return false;
	});
});