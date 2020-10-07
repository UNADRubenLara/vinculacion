<?php
print ("
<script type='application/javascript'>
const CACHE_NAME = 'v1.0_vinculacion',
    urlsToCache = [
        './',
        './public/js/serviceworker.js',
        './public/img/'
    ]
self.addEventListener('install', i => {
    i.waitUntil(
        caches.open(CACHE_NAME)
            .then(cache => {
                return cache.addAll(urlsToCache)
                    .then(() => self.skipWaiting())
            })
            .catch(err => console.log('Error in Cache Write', err))
    )
})

self.addEventListener('activate', a => {
    const cacheWhitelist = [CACHE_NAME]
    a.waitUntil(
        caches.keys()
            .then(cacheNames => {
                return Promise.all(
                    cacheNames.map(cacheName => {
                        if (cacheWhitelist.indexOf(cacheName) === -1) {
                            return caches.delete(cacheName)
                        }
                    })
                )
            })
            .then(() => self.clients.claim())
    )
})

self.addEventListener('fetch', f => {
    f.respondWith(
        caches.match(f.request)
            .then(res => {
                if (res) {
                    return res
                }
                return fetch(f.request)
            })
    )
})</script>");