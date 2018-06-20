$(function() {
    $('.seo-side').slick({
        autoplay: true,
    });
    $('#listCity .li-city').click(function() {
        var $dropValue = $(this).html();
        console.log($dropValue);
        $('#inputCity').val($dropValue);
        $.closePopup();
        return false;
    });
    $('#listIndustry .li-city').click(function() {
        var $dropValue = $(this).html();
        $('#inputIndustry').val($dropValue);
        $.closePopup();
        return false;
    });
    $('#citySearch .confirm-btn').click(function() {
        var cityInputValue = $('#citySearch .tt-input').val();
        $('#inputCity').val(cityInputValue);
        $.closePopup();
        return false;
    });
    $('#industrySearch .confirm-btn').click(function() {
        var industryInputValue = $('#industrySearch .tt-input').val();
        $('#inputIndustry').val(industryInputValue);
        $.closePopup();
        return false;
    });
    //form validator
    $('#form01').validator({
        focus: false
    }).on('submit', function(e) {
        if (e.isDefaultPrevented()) {
            // handle the invalid form...
        } else {
            e.preventDefault();
        }
    })
    $('#form02').validator({
        focus: false
    }).on('submit', function(e) {
        if (e.isDefaultPrevented()) {
            // handle the invalid form...
        } else {
            e.preventDefault();
        }
    })
})