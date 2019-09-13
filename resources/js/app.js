/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('blood-search', require('./components/BloodRequestSearch.vue').default);
Vue.component('location-search', require('./components/LocationSearch.vue').default);
// Vue.component('card-list', require('./components/CardList.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});


window.onload = ()=>{        
  $('#editor').trumbowyg({
      svgPath:`${window.location.origin}/image/icons.svg`,
      btns: [['viewHTML'],
      ['bold', 'italic'],
      ['link'],
      ['undo', 'redo'],
      ['unorderedList', 'orderedList'],
      ['removeformat'],
      ['formatting'],],
      tagsToRemove: ['script', 'link'],
      removeformatPasted: true
  });  

  

  $('.upload-container').hide();
  let croppie_options = {
      type: 'base64',
      format: 'png',
      size: {width: 200, height: 200}
  };
  
  let croppie_init = {
    viewport: {
        width: 200,
        height: 200,
        type: 'circle',                                           
    },
    enforceBoundary: false,
    enableExif: true
  };

  $cropieImage = $('.upload').croppie(croppie_init);
let rawImage;
  function readURLa(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();        
          reader.onload = function (e) {
              rawImage = e.target.result;                    
              $('.upload-container').show();
              $('.custom-file').hide();
              $cropieImage.croppie('bind', {
                url: rawImage
            }).then(()=>{
              //   console.log('bind');
            });                                                  
          }
          reader.readAsDataURL(input.files[0]);
      }
  }

  $('#file').on('change', function(){
      readURLa(this);
      
  });

  $('#cancelCropImage').on('click', function () {
      $('.custom-file').show();
      $('.upload-container').hide();
  });

  $('#cropImage').on('click', function () {
      $cropieImage.croppie('result', croppie_options).then(function (resp) {
          $('.upload-container').hide();
          $('#avatar').attr('src', resp);
          $('.custom-file').show();
      });
  });

// File upload in profile section
        var $uploadCrop, rawImg;
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();        
                reader.onload = function (e) {
                    $('#imgEdit').find('.upload-img').addClass('ready');
                    $('#imgEdit').modal('show');
                    rawImg = e.target.result;                                               
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $uploadCrop = $('#imgEdit').find('.upload-img').croppie(croppie_init);
        $('#imgEdit').on('shown.bs.modal', function(e){                                                
            $uploadCrop.croppie('bind', {
                url: rawImg
            }).then(()=>{
                // console.log('bind');
            });
        });

        $('#croppie_file').on('change', function(){
            readURL(this);
        });
        
        $('#cropImagePop').on('click', function (ev) {
            $uploadCrop.croppie('result', croppie_options).then(function (resp) {
                $('#create_avatar').attr('src', resp);
                $("input[name='avatar']").val(resp);
                $('#imgEdit').modal('hide');
            });
        });                                                                       
    }


