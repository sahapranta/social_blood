self.addEventListener('install', function(event) {
event.waitUntil(
    caches.open('v1').then(function(cache) {
      return cache.addAll([
          '/',
          '/css/app.css',
          '/js/app.js',
          '/images/wave.svg',
          '/image/blood.svg',
        ]);
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
