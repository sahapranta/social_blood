// "use strict";

var version = 'v2';

var offlineFundamentals = [
  '/',
  'css/app.css',
  'js/app.js',
  'images/wave.svg',
  'image/blood.svg'
];


self.addEventListener("install", function(event) {
  event.waitUntil(
    caches     
      .open(version + 'fundamentals')
      .then(function(cache) {
        return cache.addAll(offlineFundamentals);
      })
  );
});


self.addEventListener('fetch', function(event) {
    event.respondWith(
        caches.match(event.request).then(function(response) {
            return response || fetch(event.request);
        })
    );
});
