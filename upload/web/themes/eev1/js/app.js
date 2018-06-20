$(function() {
    // form validator
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
    $('#form03').validator({
        focus: false
    }).on('submit', function(e) {
        if (e.isDefaultPrevented()) {
            // handle the invalid form...
        } else {
            e.preventDefault();
        }
    })
    //input-select
    $('.input-select .dropdown-box a').click(function() {
        var $dropValue = $(this).html();
        $(this).parents('.input-select').find('.form-control').val($dropValue);
        $(this).parents('.input-select').toggleClass('active');
        return false;
    });
    $('.input-select .select-btn').click(function(e) {
        $(this).parents('.input-select').toggleClass('active');
        $(document).one("click", function() {
            $('.input-select').removeClass('active')
        });
        e.stopPropagation();
    })
    $('.input-select-js').focus(function(e) {
        $(this).parents('.input-select').toggleClass('active');
        $(document).one("click", function() {
            $('.input-select').removeClass('active')
        });
        e.stopPropagation();
    });
    $('.input-select').on("click", function(e) {
        e.stopPropagation();
    });
    $('.input-select-null-js').on('change textInput input focus', function(e) {
        if ($(this).val() == '') {
            $(this).parents('.input-select').addClass('active');
            $(document).one("click", function() {
                $(this).parents('.input-select').removeClass('active')
            });
        } else {
            e.stopPropagation();
        }
    });
    $(this).on('focusout', function(e) {
        $(this).parents('.input-select').removeClass('active');
        e.stopPropagation();
    });
    // tab
    $('#goTab01').click(function() {
        $('#loginTab a[href="#tab01"]').tab('show');
        return false;
    })
    $('#goTab02').click(function() {
        $('#loginTab a[href="#tab02"]').tab('show');
        return false;
    })
    // login
    $('#goLogin').click(function() {
        $('#modalLogin').modal('show');
        $('#loginTab a[href="#tab02"]').tab('show');
        return false;
    })
    $('#goReg').click(function() {
        $('#modalLogin').modal('show');
        $('#loginTab a[href="#tab01"]').tab('show');
        return false;
    })
})