self.addEventListener('install', function(event) {
event.waitUntil(
    caches.open('v1').then(function(cache) {
      return cache.addAll([
          '/',
          '/home',
          '/login',
          '/css/app.css',
          '/js/app.js',
          '/images/wave.svg',
          '/image/blood.svg',
          'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css',
          'https://foliotek.github.io/Croppie/croppie.js',
          'https://foliotek.github.io/Croppie/croppie.css',
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

