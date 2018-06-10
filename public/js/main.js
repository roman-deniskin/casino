$(document).ready(function() {
	$('.map_object_js, .modal_mask').click(function(e){
        showModal($(this).attr('id'));
        selectModalContentFirstLvl($(this).attr('id'));
	})
	$('.modal_list_item_js').click(function(e){
		selectModalContentSecondLvl($('.modal_mask').attr('id'), $(this).attr('id'));
	})
    
    function showModal(modalId){
    	if($('.modal_mask').hasClass('opened')){
            if($('.modal_content2').hasClass('opened')){
                $('.modal_content2').removeClass('opened');
                $('.modal_content1').addClass('opened');
            }
            else{
                $('.modal_mask').removeClass('opened');
                $('.modal_wrapper').removeClass('opened');
            }
    	}
    	else{
            $('.modal_mask').attr('id', modalId);
    		$('.modal_mask').addClass('opened');
    		$('.modal_wrapper').addClass('opened');
            $('.modal_content1').addClass('opened');
            $('.modal_content2').removeClass('opened');
    	}
    }
    function selectModalContentFirstLvl(itemId){
        $('.modal_content2').removeClass('opened');
        $('.modal_content1').addClass('opened');
        var itemId = itemId;
        var bigPhoto = itemsArray[itemId]['bigPhoto'];
        var name = itemsArray[itemId]['name'];
        var height = itemsArray[itemId]['height'];
        var description = itemsArray[itemId]['description'];
        $('.detail_pic_first_js').attr('src', bigPhoto);
        $('.detail_name_first_js').html(name);
        $('.detail_height_first_js').html(height);
        $('.detail_text_first_js').html(description);
    }
    function selectModalContentSecondLvl(firstItemId, secondItemId){
        $('.modal_content1').removeClass('opened');
        $('.modal_content2').addClass('opened');
        var secondItemId = secondItemId;
        var bigPhoto = itemsArray[firstItemId]['items'][secondItemId]['bigPhoto'];
        var name = itemsArray[firstItemId]['items'][secondItemId]['name'];
        var description = itemsArray[firstItemId]['items'][secondItemId]['description'];
        $('.detail_pic_second_js').attr('src', bigPhoto);
        $('.detail_name_second_js').html(name);
        $('.detail_text_second_js').html(description);
    }
});