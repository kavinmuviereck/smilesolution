

    var input = document.querySelector("#phone2");
    window.intlTelInput(input, {
      // allowDropdown: false,
      // autoHideDialCode: false,
       autoPlaceholder: "off",
      // dropdownContainer: document.body,
      // excludeCountries: ["us"],
      // formatOnDisplay: false,
      // geoIpLookup: function(callback) {
      //   $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
      //     var countryCode = (resp && resp.country) ? resp.country : "";
      //     callback(countryCode);
      //   });
      // },
      // hiddenInput: "full_number",
      initialCountry: "in",
      // localizedCountries: { 'de': 'Deutschland' },
      // nationalMode: false,
      // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
      // placeholderNumberType: "MOBILE",
      // preferredCountries: ['cn', 'jp'],
      separateDialCode: true,
              // initial country
        // initialCountry: "in",
      utilsScript: "build/js/utils.js",
    });
         input.addEventListener("countrychange", function() {
var countryCode = $('#countrycodes2').siblings('div').find('.selected-dial-code').text();
      $('#countrycodes2').val(countryCode);


    });
      $('#countrycodes2').val('+91');       
$('#phone2').css('padding-left','95px');
$('.separate-dial-code').css('width','100%');
$('#phone2').css('width','100%');

function validate(evt) {
  var theEvent = evt || window.event;

  // Handle paste
  if (theEvent.type === 'paste') {
      key = event.clipboardData.getData('text/plain');
  } else {
  // Handle key press
      var key = theEvent.keyCode || theEvent.which;
      key = String.fromCharCode(key);
  }
  var regex = /[0-9]|\./;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
}

function monthlyhide(values){
  
  if($('#bigswitch').is(":checked")){
  $('.onetime').css('display','none');
  $('.monthly').css('display','block');

  }
  else{
  $('.monthly').css('display','none');
  $('.onetime').css('display','block');
}

}

// -------------onetime------------------------------

function onetime(){

var login = "<?= $login ?>";

if(login.length == 0){
  alert("Please Login to Continue");
 $('.modal').modal('hide') // closes all active pop ups.
 $('.modal-backdrop').remove() // removes the grey overlay.
 $('#login').click();
}
else{
var name = "<?= $customername ?>";
var mobile = "<?= $customermobile ?>";
var email = "<?= $customeremail ?>";
var onetime = $('input[name="onetimecost"]').val();
var plan_month = $('input[name="plan_month"]').val();
var plan_cost = $('input[name="plan_cost"]').val();
var plan_price_id = $('input[name="plan_price_id"]').val();
var plan_id = $('input[name="plan_id"]').val();
var package = $('input[name="package"]').val();
var plan_name = $('input[name="plan_name"]').val();
var adcost = $('input[name="onetimeadcost"]').val();

     
  var options = {
      "key": "<?= $razorpaykeyid ?>",
      "amount": onetime, 
      "currency": "INR",
      "name": "Yetlo Social",
      "description": "India's Leading Digital Marketing Company",
      // "image": "http://yetlosocial.com/img/Yetlologo1.png",
      "handler": function (response){
         var orderid = response.razorpay_payment_id;
          // alert(response.razorpay_signature);
          $.ajax({
            type: 'post',
            url: '../ajax_load.php',
            data: 'action=onetimepayment&orderid='+orderid+'&customerid='+login+'&name='+name+'&mobile='+mobile+'&email='+email+'&totalcost='+onetime+'&plan_cost='+plan_cost+'&plan_month='+plan_month+'&plan_price_id='+plan_price_id+'&plan_id='+plan_id+'&package='+package+'&plan_name='+plan_name+'&adcost='+adcost,
            dataType: "json",         
                             
             success: function (data) {
               if(data['validation'] == '1'){                 
                  $.confirm({
                    icon: 'fa fa-check',
                    title: '',
                    content: 'Order Placed Successfully !',
                    type: 'purple',
                    autoClose: 'Okay|3000',
                    buttons: {
                      Okay: function () {
                        window.location.reload();
                      }
                    }
                  });                        
              }
              else{   
              }        
            }
        });

      },
      "prefill": {
          "contact": mobile,
          "name": name,
          "email": email
      },
      // "notes": {
      //     "address": "note value"
      // },
      "theme": {
          "color": "#6D40AE"
      }
  };
  var rzp1 = new Razorpay(options);
      rzp1.open();
      e.preventDefault();
 
};


};


// -------------monthly------------------------------

function monthly(){

var login = "<?= $login ?>";
if(login.length == 0){
  alert("Please Login to Continue");
  $('.modal').modal('hide') // closes all active pop ups.
  $('.modal-backdrop').remove() // removes the grey overlay.
   $('#login').click();
}
else{
var name = "<?= $customername ?>";
var mobile = "<?= $customermobile ?>";
var email = "<?= $customeremail ?>";
var monthly_cost = $('input[name="monthly_cost"]').val();
var plan_month = $('input[name="plan_month"]').val();
var monthly_plan_cost = $('input[name="monthly_plan_cost"]').val();
var plan_price_id = $('input[name="plan_price_id"]').val();
var plan_id = $('input[name="plan_id"]').val();
var package = $('input[name="package"]').val();
var plan_name = $('input[name="plan_name"]').val();
var adcost = $('input[name="monthlyadcost"]').val();

     
$('#preloder').css('display','block');
$('.loader').css('display','block');                           


  $.ajax({
  type: 'post',
  url: '../ajax_load.php',
  data: 'action=checkplanexists&totalcost='+monthly_cost+'&plan_month='+plan_month+'&plan_price_id='+plan_price_id+'&plan_id='+plan_id+'&package='+package+'&plan_name='+plan_name,
  dataType: "json",         
  success: function (data) {
  if(data['validation'] == '1'){ 
      var razorpay_plan_id = data['razorpay_plan_id'];

        $.ajax({
        type: 'post',
        url: '../ajax_load.php',
        data: 'action=createsubscription&razorpay_plan_id='+razorpay_plan_id+'&totalcost='+monthly_cost+'&plan_month='+plan_month+'&plan_price_id='+plan_price_id+'&plan_id='+plan_id+'&package='+package+'&plan_name='+plan_name+'&customerid='+login+'&name='+name+'&mobile='+mobile+'&email='+email,
        dataType: "json",         
        success: function (data) {
        if(data['validation'] == '1'){ 
            var razorpay_subscription_id = data['razorpay_subscription_id'];   

                    var options2 = {
                    "key": "<?= $razorpaykeyid ?>",
                    "subscription_id": razorpay_subscription_id, 
                    // "subscription_card_change": 1,
                    "name": "Yetlo Social",
                    "description": "India's Leading Digital Marketing Company",
                    // "image": "http://yetlosocial.com/img/Yetlologo1.png",
                    "handler": function (response){
                       var orderid = response.razorpay_payment_id;
                       var signature = response.razorpay_signature;
                       // alert(orderid+ signature);
                      $.ajax({
                        type: 'post',
                        url: '../ajax_load.php',
                        data: 'action=monthlypayment&orderid='+orderid+'&customerid='+login+'&name='+name+'&mobile='+mobile+'&email='+email+'&totalcost='+monthly_cost+'&plan_cost='+monthly_plan_cost+'&plan_month='+plan_month+'&plan_price_id='+plan_price_id+'&plan_id='+plan_id+'&package='+package+'&plan_name='+plan_name+'&razorpay_subscription_id='+razorpay_subscription_id+'&razorpay_plan_id='+razorpay_plan_id+'&razorpay_signature='+signature+'&adcost='+adcost,
                        dataType: "json",         
                                         
                         success: function (data) {
                           if(data['validation'] == '1'){                 
                              $.confirm({
                                icon: 'fa fa-check',
                                title: '',
                                content: 'Order Placed Successfully !',
                                type: 'purple',
                                autoClose: 'Okay|3000',
                                buttons: {
                                  Okay: function () {
                                    window.location.reload();
                                  }
                                }
                              });                        
                          }
                          else{   
                          }        
                        }
                    });

                  },
                  "prefill": {
                      "contact": mobile,
                      "name": name,
                      "email": email
                  },
                  // "notes": {
                  //     "address": "note value"
                  // },
                  "theme": {
                      "color": "#6D40AE"
                  }
              };
              var rzp2 = new Razorpay(options2);
                  rzp2.open();
              $('#preloder').css('display','none');    
              $('.loader').css('display','none');                           


            }
          }
        });

  }
  else{  
              
  }        
  }
  });

 
};
};
  
/*  carousel slider  */
//   $('#recipeCarousel').carousel({
//   interval: 5000
// })

$('.carousel .carousel-item').each(function(){
    var minPerSlide = 3;
    var next = $(this).next();
    if (!next.length) {
    next = $(this).siblings(':first');
    }
    next.children(':first-child').clone().appendTo($(this));
    
    for (var i=0;i<minPerSlide;i++) {
        next=next.next();
        if (!next.length) {
          next = $(this).siblings(':first');
        }
        
        next.children(':first-child').clone().appendTo($(this));
      }
});

$('.packagecustomplan').on('click',function(e){
  event.preventDefault();
  var plan = $(this).attr('data-plan');
  var package = $(this).attr('data-packagename');
  $("input[name='packageandplan']").val(package+" "+plan);
});

$('.carousel-item').first().addClass('active');

/*  numberadcost   */
  
function numberadcost(val) {
var monthlyadcost = val;
if (val == "" || val < 0){ monthlyadcost = 0; }
var upto = $('input[name="uptoadcost"]').val();
if(val > upto){
 alert("Max Ad cost For this Plan is "+$('input[name="uptoadcost"]').val());
 var oldValue = $('#monthlyadcost').attr('data-oldvalue');
 $('#monthlyadcost').val(oldValue);
 $('#onetimeadcost').val(oldValue);
 return false;
}

 $('#monthlyadcost').attr('data-oldvalue',val);
 $('#onetimeadcost').attr('data-oldvalue',val);

// monthly
var plan_cost = $('input[name="monthly_plan_cost"]').val();
monthlycost = parseInt(monthlyadcost) + parseInt(plan_cost);
$('#monthlygst').html("Rs."+parseInt(monthlycost * 0.18));
monthlycost = parseInt(monthlycost * 0.18)+parseInt(monthlycost);
$('#monthlytotal').html("Total Rs."+parseInt(monthlycost));
$('input[name="monthly_cost"]').val(monthlycost*100);


//onetime
var plan_cost = $('input[name="plan_cost"]').val();
var month = $('input[name="plan_month"]').val();
onetimecost = (parseInt(monthlyadcost) * parseInt(month)) + parseInt(plan_cost);
$('#onetimegst').html("Rs."+parseInt(onetimecost * 0.18));
onetimecost = parseInt(onetimecost * 0.18)+parseInt(onetimecost);
$('#onetimetotal').html("Total Rs."+parseInt(onetimecost));
$('input[name="onetimecost"]').val(onetimecost*100);


$('input[name="monthlyadcost"]').val(monthlyadcost);
$('input[name="onetimeadcost"]').val(monthlyadcost);


}


/*  my card  */
  $num = $('.my-card').length;
$even = $num / 2;
$odd = ($num + 1) / 2;

if ($num % 2 == 0) {
  $('.my-card:nth-child(' + $even + ')').addClass('active');
  $('.my-card:nth-child(' + $even + ')').prev().addClass('prev');
  $('.my-card:nth-child(' + $even + ')').next().addClass('next');
} else {
  $('.my-card:nth-child(' + $odd + ')').addClass('active');
  $('.my-card:nth-child(' + $odd + ')').prev().addClass('prev');
  $('.my-card:nth-child(' + $odd + ')').next().addClass('next');
}

$('.my-card, .pricing-plan, .pricing-title, .pricing-body').click(function() {
  $slide = $('.my-card.active').width();
  console.log($('.my-card.active').position().left);
  
  if ($(this).hasClass('next')) {
    $('.card-carousel').stop(false, true).animate({left: '-=' + $slide});
  } else if ($(this).hasClass('prev')) {
    $('.card-carousel').stop(false, true).animate({left: '+=' + $slide});
  }
  
  $(this).removeClass('prev next');
  $(this).siblings().removeClass('prev active next');
  
  $(this).addClass('active');
  $(this).prev().addClass('prev');
  $(this).next().addClass('next');
});


// Keyboard nav
$('html body').keydown(function(e) {
  if (e.keyCode == 37) { // left
    $('.active').prev().trigger('click');
  }
  else if (e.keyCode == 39) { // right
    $('.active').next().trigger('click');
  }
});

 
    /* jshint browser: true, jquery: true, devel: true */
/* global window, jQuery */


/* Convert to scroll? http://jsperf.com/scroll-vs-css-transform/19 */
(function($, window, undefined) {
'use strict';

    function throttle(func, delay) {
      var timer = null;

      return function() {
        var context = this, args = arguments;

        if (timer === null) {
            timer = setTimeout(function () {
                func.apply(context, args);
                timer = null;
            }, delay);
        }
      };
    }

    // Check for browser CSS support and cache the result for subsequent calls.
    var checkStyleSupport = (function() {
            var support = {};
            return function(prop) {
                if ( support[prop] !== undefined ) { return support[prop]; }

                var div = document.createElement('div'),
                    style = div.style,
                    ucProp = prop.charAt(0).toUpperCase() + prop.slice(1),
                    prefixes = ["webkit", "moz", "ms", "o"],
                    props = (prop + ' ' + (prefixes).join(ucProp + ' ') + ucProp).split(' ');

                for ( var i in props ) {
                    if ( props[i] in style ) {
                        return support[prop] = props[i];
                    }
                }

                return support[prop] = false;
            };
        }());

    var svgNS = 'http://www.w3.org/2000/svg',
        svgSupport = (function() {
            var support;
            return function() {
                if ( support !== undefined ) { return support; }
                var div = document.createElement('div');
                div.innerHTML = '<svg/>';
                support = ( div.firstChild && div.firstChild.namespaceURI === svgNS );
                return support;
            };
        }());

$.fn.flipster = function(options) {
    var isMethodCall = (typeof options === 'string' ? true : false);

    if ( isMethodCall ) {
        var args = Array.prototype.slice.call(arguments, 1);
        return this.each(function(){
            var methods = $(this).data('methods');
            if ( methods[options] ) { return methods[options].apply(this, args); }
            else { return this; }
        });
    }

    var defaults = {
            itemContainer: 'ul',
            // [string|object]
            // Selector for the container of the flippin' items.

            itemSelector: 'li',
            // [string|object]
            // Selector for children of `itemContainer` to flip

            start: 'center',
            // ['center'|number]
            // Zero based index of the starting item, or use 'center' to start in the middle

            fadeIn: 400,
            // [milliseconds]
            // Speed of the fade in animation after items have been setup

            loop: false,
            // [true|false]
            // Loop around when the start or end is reached

            autoplay: false,
            // [false|milliseconds]
            // If a positive number, Flipster will automatically advance to next item after that number of milliseconds

            pauseOnHover: true,
            // [true|false]
            // If true, autoplay advancement will pause when Flipster is hovered

            style: 'coverflow',
            // [coverflow|carousel|flat|...]
            // Adds a class (e.g. flipster--coverflow) to the flipster element to switch between display styles
            // Create your own theme in CSS and use this setting to have Flipster add the custom class

            spacing: -0.6,
            // [number]
            // Space between items relative to each item's width. 0 for no spacing, negative values to overlap

            click: true,
            // [true|false]
            // Clicking an item switches to that item

            keyboard: true,
            // [true|false]
            // Enable left/right arrow navigation

            scrollwheel: true,
            // [true|false]
            // Enable mousewheel/trackpad navigation; up/left = previous, down/right = next

            touch: true,
            // [true|false]
            // Enable swipe navigation for touch devices

            nav: false,
            // [true|false|'before'|'after']
            // If not false, Flipster will build an unordered list of the items
            // Values true or 'before' will insert the navigation before the items, 'after' will append the navigation after the items

            buttons: false,
            // [true|false|'custom']
            // If true, Flipster will insert Previous / Next buttons with SVG arrows
            // If 'custom', Flipster will not insert the arrows and will instead use the values of `buttonPrev` and `buttonNext`

            buttonPrev: 'Previous',
            // [text|html]
            // Changes the text for the Previous button

            buttonNext: 'Next',
            // [text|html]
            // Changes the text for the Next button

            onItemSwitch: false
            // [function]
            // Callback function when items are switched
            // Arguments received: [currentItem, previousItem]
        },

        settings = $.extend({}, defaults, options),

        $window = $(window),

        transformSupport = checkStyleSupport('transform'),

        classes = {
            main: 'flipster',
            active: 'flipster--active',
            container: 'flipster__container',

            nav: 'flipster__nav',
            navChild: 'flipster__nav__child',
            navItem: 'flipster__nav__item',
            navLink: 'flipster__nav__link',
            navCurrent: 'flipster__nav__item--current',
            navCategory: 'flipster__nav__item--category',
            navCategoryLink: 'flipster__nav__link--category',

            button: 'flipster__button',
            buttonPrev: 'flipster__button--prev',
            buttonNext: 'flipster__button--next',

            item: 'flipster__item',
            itemCurrent: 'flipster__item--current',
            itemPast: 'flipster__item--past',
            itemFuture: 'flipster__item--future',
            itemContent: 'flipster__item__content'
        },

        classRemover = new RegExp('\\b(' + classes.itemCurrent + '|' + classes.itemPast + '|' + classes.itemFuture + ')(.*?)(\\s|$)','g'),
        whiteSpaceRemover = new RegExp('\\s\\s+','g');

    return this.each(function() {

        var self = $(this),
            methods,

            _container,
            _containerWidth,
            _items,
            _itemOffsets = [],
            _currentIndex = 0,
            _currentItem,

            _nav,
            _navItems,
            _navLinks,

            _playing = false,
            _startDrag = false;

        function buildButtonContent(dir) {
            var text = ( dir === 'next' ? settings.buttonNext : settings.buttonPrev );

            if ( settings.buttons === 'custom' || !svgSupport ) { return text; }

            return '<svg viewBox="0 0 13 20" xmlns="' + svgNS + '" aria-labelledby="title"><title>'+text+'</title><polyline points="10,3 3,10 10,17"' + (dir === 'next' ? ' transform="rotate(180 6.5,10)"' : '' ) + '/></svg>';
        }

        function buildButton(dir){
          dir = dir || 'next';

          return $('<button class="' + classes.button + ' ' + ( dir === 'next' ? classes.buttonNext : classes.buttonPrev ) + '" role="button" />')
                  .html( buildButtonContent(dir) )
                  .on('click', function(e) {
                      jump(dir);
                      e.preventDefault();
                  });

        }

        function buildButtons() {
            if ( settings.buttons && _items.length > 1 ) {
                self.find('.' + classes.button).remove();
                self.append( buildButton('prev'), buildButton('next') );
            }
        }

        function buildNav() {
            var navCategories = {};

            if ( !settings.nav || _items.length <= 1 ) { return; }

            if ( _nav ) { _nav.remove(); }

            _nav = $('<ul class="' + classes.nav + '" role="navigation" />');
            _navLinks = $('');

            _items.each(function(i){
                var item = $(this),
                    category = item.data('flip-category'),
                    itemTitle = item.data('flip-title') || item.attr('title') || i,
                    navLink = $('<a href="#" class="' + classes.navLink + '">' + itemTitle + '</a>')
                        .data('index',i);

                _navLinks = _navLinks.add(navLink);

                if ( category ) {

                    if ( !navCategories[category] ) {

                        var categoryItem = $('<li class="' + classes.navItem + ' ' + classes.navCategory + '">');
                        var categoryLink = $('<a href="#" class="' + classes.navLink + ' ' +  classes.navCategoryLink + '" data-flip-category="' + category + '">' + category + '</a>')
                                .data('category',category)
                                .data('index',i);

                        navCategories[category] = $('<ul class="' + classes.navChild + '" />');

                        _navLinks = _navLinks.add(categoryLink);

                        categoryItem
                            .append(categoryLink, navCategories[category])
                            .appendTo(_nav);
                    }

                    navCategories[category].append(navLink);
                } else {
                    _nav.append(navLink);
                }

                navLink.wrap('<li class="' + classes.navItem + '">');

            });

            _nav.on('click','a',function(e){
                var index = $(this).data('index');
                if ( index >= 0 ) {
                    jump( index );
                    e.preventDefault();
                }
            });

            if ( settings.nav === 'after' ) { self.append(_nav); }
            else { self.prepend(_nav); }

            _navItems = _nav.find('.' + classes.navItem);
        }

        function updateNav() {
            if ( settings.nav ) {

                var category = _currentItem.data('flip-category');

                _navItems.removeClass(classes.navCurrent);

                _navLinks
                    .removeClass(classes.navCurrent)
                    .filter(function() {
                        return ( $(this).data('index') === _currentIndex || ( category ? $(this).data('category') === category : false ));
                    })
                        .parent()
                        .addClass(classes.navCurrent);

            }
        }

        function noTransition() {
            self.css('transition','none');
            _container.css('transition','none');
            _items.css('transition','none');
        }

        function resetTransition() {
            self.css('transition','');
            _container.css('transition','');
            _items.css('transition','');
        }

        function calculateBiggestItemHeight() {
            var biggestHeight = 0,
                itemHeight;

            _items.each(function() {
                itemHeight = $(this).height();
                if ( itemHeight > biggestHeight ) { biggestHeight = itemHeight; }
            });
            return biggestHeight;
        }

        function resize(skipTransition) {
            if ( skipTransition ) { noTransition(); }

            _containerWidth = _container.width();
            _container.height(calculateBiggestItemHeight());

            _items.each(function(i){
                var item = $(this),
                    width,
                    left;

                item.attr('class',function(i, c){
                    return c && c.replace(classRemover, '').replace(whiteSpaceRemover,' ');
                });

                width = item.outerWidth();

                if ( settings.spacing !== 0 ) {
                  item.css('margin-right', ( width * settings.spacing) + 'px');
                }

                left = item.position().left;
                _itemOffsets[i] = -1 * ((left + (width / 2)) - (_containerWidth / 2));

                if ( i === _items.length - 1 ) {
                    center();
                    if ( skipTransition ) { setTimeout(resetTransition,1); }
                }
            });
        }

        function center() {
            var total = _items.length,
                item, newClass, zIndex;

            _items.each(function(i){
                item = $(this);
                newClass = ' ';

                if ( i === _currentIndex ) {
                    newClass += classes.itemCurrent;
                    zIndex = (total + 1);
                } else if ( i < _currentIndex ) {
                    newClass += classes.itemPast + ' ' +
                        classes.itemPast + '-' + (_currentIndex - i);
                    zIndex = i;
                } else {
                    newClass += classes.itemFuture + ' ' +
                        classes.itemFuture + '-' + ( i - _currentIndex );
                    zIndex = (total - i);
                }

                item.css('z-index', zIndex )
                  .attr('class',function(i, c){
                    return c && c.replace(classRemover, '').replace(whiteSpaceRemover,' ') + newClass;
                  });
            });

            if ( _currentIndex >= 0 ) {
                if ( !_containerWidth || _itemOffsets[_currentIndex] === undefined ) { resize(true); }

                if ( transformSupport ) {
                    _container.css('transform', 'translateX(' + _itemOffsets[_currentIndex] + 'px)');
                } else {
                    _container.css({ 'left': _itemOffsets[_currentIndex] + 'px' });
                }
            }

            updateNav();
        }

        function jump(to) {
            var _previous = _currentIndex;

            if ( _items.length <= 1 ) { return; }

            if ( to === 'prev' ) {
                if ( _currentIndex > 0 ) { _currentIndex--; }
                else if ( settings.loop ) { _currentIndex = _items.length - 1; }
            } else if ( to === 'next' ) {
                if ( _currentIndex < _items.length - 1 ) { _currentIndex++; }
                else if ( settings.loop ) { _currentIndex = 0; }
            } else if ( typeof to === 'number' ) {
                _currentIndex = to;
            } else if ( to !== undefined ) {
                _currentIndex = _items.index(to); // if object is sent, get its index
            }

            _currentItem = _items.eq(_currentIndex);

            if ( _currentIndex !== _previous && settings.onItemSwitch ) { settings.onItemSwitch.call(self, _items[_currentIndex], _items[_previous]); }

            center();

            return self;
        }

        function play(interval) {
            settings.autoplay = interval || settings.autoplay;

            clearInterval(_playing);

            _playing = setInterval(function(){
                var prev = _currentIndex;
                jump('next');
                if ( prev === _currentIndex && !settings.loop ) { clearInterval(_playing); }
            }, settings.autoplay);

            return self;
        }

        function pause() {
            clearInterval(_playing);
            if ( settings.autoplay ) { _playing = -1; }

            return self;
        }

        function show() {
            resize(true);
            self.hide()
                .css('visibility','')
                .addClass(classes.active)
                .fadeIn(settings.fadeIn);
        }

        function index() {

            _container = self.find(settings.itemContainer).addClass(classes.container);

            _items = _container.find(settings.itemSelector);

            if ( _items.length <= 1 ) { return; }

            _items
                .addClass(classes.item)
                // Wrap inner content
                .each(function(){
                    var item = $(this);
                    if ( !item.children('.' + classes.itemContent).length ) { item.wrapInner('<div class="' + classes.itemContent + '" />'); }
                });

            // Navigate directly to an item by clicking
            if ( settings.click ) {
                _items.on('click.flipster touchend.flipster', function(e) {
                    if ( !_startDrag ) {
                        if ( !$(this).hasClass(classes.itemCurrent) ) { e.preventDefault(); }
                        jump(this);
                    }
                });
            }

            // Insert navigation if enabled.
            buildButtons();
            buildNav();

            if ( _currentIndex >= 0 ) { jump(_currentIndex); }

            return self;
        }


        function keyboardEvents(elem) {
            if ( settings.keyboard ) {
                elem[0].tabIndex = 0;
                elem.on('keydown.flipster', throttle(function(e){
                    var code = e.which;
                    if ( code === 37 ) {
                        jump('prev');
                        e.preventDefault();
                    } else if ( code === 39 ) {
                        jump('next');
                        e.preventDefault();
                    }
                },250,true));
            }
        }

        function wheelEvents(elem) {
            if ( settings.scrollwheel ) {
                var _wheelInside = false,
                    _actionThrottle = 0,
                    _throttleTimeout = 0,
                    _delta = 0,
                    _dir, _lastDir;

                elem
                    .on('mousewheel.flipster wheel.flipster', function(){ _wheelInside = true; })
                    .on('mousewheel.flipster wheel.flipster', throttle(function(e){

                        // Reset after a period without scrolling.
                        clearTimeout(_throttleTimeout);
                        _throttleTimeout = setTimeout(function(){
                            _actionThrottle = 0;
                            _delta = 0;
                        }, 300);

                        e = e.originalEvent;

                        // Add to delta (+=) so that continuous small events can still get past the speed limit, and quick direction reversals get cancelled out
                        _delta += ( e.wheelDelta || ( e.deltaY + e.deltaX ) * -1 ); // Invert numbers for Firefox

                        // Don't trigger unless the scroll is decent speed.
                        if ( Math.abs(_delta) < 25 ) { return; }

                        _actionThrottle++;

                        _dir = ( _delta > 0 ? 'prev' : 'next' );

                        // Reset throttle if direction changed.
                        if ( _lastDir !== _dir ) { _actionThrottle = 0; }
                        _lastDir = _dir;

                        // Regular scroll wheels trigger less events, so they don't need to be throttled. Trackpads trigger many events (inertia), so only trigger jump every three times to slow things down.
                        if ( _actionThrottle < 6 || _actionThrottle % 3 === 0 ) { jump(_dir); }

                        _delta = 0;

                    },50));

                // Disable mousewheel on window if event began in elem.
                $window.on('mousewheel.flipster wheel.flipster',function(e){
                    if ( _wheelInside ) {
                        e.preventDefault();
                        _wheelInside = false;
                    }
                });
            }
        }

        function touchEvents(elem) {
            if ( settings.touch ) {
                var _startDragY = false,
                    _touchJump = throttle(jump,300),
                    x, y, offsetY, offsetX;

                elem.on({
                  'touchstart.flipster' : function(e){
                          e = e.originalEvent;
                          _startDrag = ( e.touches ? e.touches[0].clientX : e.clientX );
                          _startDragY = ( e.touches ? e.touches[0].clientY : e.clientY );
                          //e.preventDefault();
                      },

                  'touchmove.flipster' : throttle(function(e){
                          if ( _startDrag !== false ) {
                              e = e.originalEvent;

                              x = ( e.touches ? e.touches[0].clientX : e.clientX );
                              y = ( e.touches ? e.touches[0].clientY : e.clientY );
                              offsetY = y - _startDragY;
                              offsetX = x - _startDrag;

                              if ( Math.abs(offsetY) < 100 && Math.abs(offsetX) >= 30 ) {
                                  _touchJump((offsetX < 0 ? 'next' : 'prev'));
                                  _startDrag = x;
                                  e.preventDefault();
                              }

                          }
                      },100),

                  'touchend.flipster touchcancel.flipster ' : function(){ _startDrag = false; }
                });
            }
        }

        function init() {

            self.css('visibility','hidden');

            index();

            if ( _items.length <= 1 ) {
                self.css('visibility','');
                return;
            }

            self.addClass([
                    classes.main,
                    ( transformSupport ? 'flipster--transform' : ' flipster--no-transform' ),
                    ( settings.style ? 'flipster--'+settings.style : '' ),
                    ( settings.click ? 'flipster--click' : '' )
                ].join(' '));

            // Set the starting item
            if ( settings.start ) {
                // Find the middle item if start = center
                if ( settings.start === 'center' ) {
                    _currentIndex = Math.floor( _items.length / 2 );
                } else {
                    _currentIndex = settings.start;
                }
            }

            jump(_currentIndex);

            var images = self.find('img');

            if ( images.length ) {
                var imagesLoaded = 0;

                // Resize after all images have loaded.
                images.on('load',function(){
                    imagesLoaded++;
                    if ( imagesLoaded >= images.length ) { show(); }
                });

                // Fallback to show Flipster while images load in case it takes a while.
                setTimeout(show,750);
            } else {
                show();
            }

            // Attach event bindings.
            $window.on('resize.flipster', throttle(resize,400));

            if ( settings.autoplay ) { play(); }

            if ( settings.pauseOnHover ) {
              _container
                  .on('mouseenter.flipster', pause)
                  .on('mouseleave.flipster', function(){
                      if ( _playing === -1 ) { play(); }
                  });
            }

            keyboardEvents(self);
            wheelEvents(_container);
            touchEvents(_container);
        }

        // public methods
        methods = {
            jump: jump,
            next: function(){ return jump('next'); },
            prev: function(){ return jump('prev'); },
            play: play,
            pause: pause,
            index: index
        };
        self.data('methods', methods);

        // Initialize if flipster is not already active.
        if ( !self.hasClass(classes.active) ) { init(); }
    });
};
})(jQuery, window);


var flipContainer = $('.flipster'),
    flipItemContainer = flipContainer.find('.flip-items'),
    flipItem = flipContainer.find('li');

flipContainer.flipster({
    itemContainer: flipItemContainer,
    itemSelector: flipItem,
    loop: true,
    //autoplay: 3000,
    start: 0,
    style: 'carousel',
    spacing: -0.2,
    scrollwheel: false,
    //nav: 'after',
    buttons: false,
})
  




    $('.flipster__item--future').css({"opacity": "1"});
    $('.flips').click();
  