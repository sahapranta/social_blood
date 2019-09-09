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
        ]);
    })
 );
});

self.addEventListener("fetch", function(event) { 
	event.respondWith( 
		return caches.match(event.request)
			.then(function (response) { 
				return response || fetch(event.request)
			.then(function(response) { 
				cache.put(event.request, response.clone());
				return response; 
			}); 
		}) 
	); 
});
