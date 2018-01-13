"use strict";var precacheConfig=[["/","8fa24ed8fe6ac1a7b4b89771d8ed12f4"],["css/app.css","ab66e72f809d5a1dd53fd854f85a53e3"],["fonts/47ce892d-e00c-49f3-b2c7-52332731d02d.woff","fa11e1d3ee417024f2c1bf540e710637"],["fonts/53d1345d-9a4d-4ff6-8720-5569a24bc7e4.ttf","388b3ff3ca4ff44025188a76a809b3cf"],["fonts/9862421f-a7e4-4a08-9ca8-79a1fbae9402.eot","79c8d8bb71c6f71b0f4a8c49d5d43634"],["fonts/e4dec283-7af8-44cc-8baa-41fd71695531.woff2","937d0947cd124b3ca48c28a4571fb79b"],["fonts/e9682088-c246-469e-a760-505dc555664c.svg","55a70633e46ee206c1a91aa6a0030967"],["fonts/icomoon.eot","caa85de31bd178f1e3d491eaef829455"],["fonts/icomoon.svg","df3aedf6e063b4f10219a1a40d61142e"],["fonts/icomoon.ttf","97c85be513b85c374ea17e1908239724"],["fonts/icomoon.woff","08acba15be37e93ebda585340494e3ce"],["fonts/icomoon.woff2","f89b13bf87c0092b3fe7280ff7a4be89"],["fonts/vendor/bootstrap-sass/bootstrap/glyphicons-halflings-regular.eot","f4769f9bdb7466be65088239c12046d1"],["fonts/vendor/bootstrap-sass/bootstrap/glyphicons-halflings-regular.svg","89889688147bd7575d6327160d64e760"],["fonts/vendor/bootstrap-sass/bootstrap/glyphicons-halflings-regular.ttf","e18bbf611f2a2e43afc071aa2f4e1512"],["fonts/vendor/bootstrap-sass/bootstrap/glyphicons-halflings-regular.woff","fa2772327f55d8198301fdb8bcfc8158"],["fonts/vendor/bootstrap-sass/bootstrap/glyphicons-halflings-regular.woff2","448c34a56d699c29117adc64c43affeb"],["js/app.js","8a50ef735515a101fa585114057a3005"],["js/manifest.js","51ab31a76475df678d5254e5dfd91189"],["js/vendor.js","832e2dcc1db32d1243adc51286c4dd2d"],["service-worker.js","835226a2e0f84a63aa347ae0244a360b"],["vendor/laravel-filemanager/css/cropper.min.css","d5f9bed1d1ce4ee36f61a417c727f267"],["vendor/laravel-filemanager/css/dropzone.min.css","2f735dbf472afcd77604ecf439319f7b"],["vendor/laravel-filemanager/css/lfm.css","f486b1f08f846bc37927eb5eed575b8f"],["vendor/laravel-filemanager/css/mfb.css","552eacea274176a26c205e6d5f770ef2"],["vendor/laravel-filemanager/img/loader.svg","7627bc820cce40098e897ca98413d895"],["vendor/laravel-filemanager/js/cropper.min.js","08143dfcfef4e05e8e593f0fa9fa046c"],["vendor/laravel-filemanager/js/dropzone.min.js","ef382b2b5e18d24161ba0fb2b90322b6"],["vendor/laravel-filemanager/js/jquery.form.min.js","c752e8d46b09b498997a56aa3e22c3e1"],["vendor/laravel-filemanager/js/lfm.js","f80c8cd8276b3a876cac0cd072028328"],["vendor/laravel-filemanager/js/mfb.js","98f2dbd642c14395d70b8946ce044a52"],["vendor/laravel-filemanager/js/script.js","a61c85eb1be81a771b95119d45cbd828"]],cacheName="sw-precache-v3-pwa-"+(self.registration?self.registration.scope:""),ignoreUrlParametersMatching=[/^utm_/],addDirectoryIndex=function(e,t){var n=new URL(e);return"/"===n.pathname.slice(-1)&&(n.pathname+=t),n.toString()},cleanResponse=function(e){return e.redirected?("body"in e?Promise.resolve(e.body):e.blob()).then(function(t){return new Response(t,{headers:e.headers,status:e.status,statusText:e.statusText})}):Promise.resolve(e)},createCacheKey=function(e,t,n,r){var o=new URL(e);return r&&o.pathname.match(r)||(o.search+=(o.search?"&":"")+encodeURIComponent(t)+"="+encodeURIComponent(n)),o.toString()},isPathWhitelisted=function(e,t){if(0===e.length)return!0;var n=new URL(t).pathname;return e.some(function(e){return n.match(e)})},stripIgnoredUrlParameters=function(e,t){var n=new URL(e);return n.hash="",n.search=n.search.slice(1).split("&").map(function(e){return e.split("=")}).filter(function(e){return t.every(function(t){return!t.test(e[0])})}).map(function(e){return e.join("=")}).join("&"),n.toString()},hashParamName="_sw-precache",urlsToCacheKeys=new Map(precacheConfig.map(function(e){var t=e[0],n=e[1],r=new URL(t,self.location),o=createCacheKey(r,hashParamName,n,!1);return[r.toString(),o]}));function setOfCachedUrls(e){return e.keys().then(function(e){return e.map(function(e){return e.url})}).then(function(e){return new Set(e)})}self.addEventListener("install",function(e){e.waitUntil(caches.open(cacheName).then(function(e){return setOfCachedUrls(e).then(function(t){return Promise.all(Array.from(urlsToCacheKeys.values()).map(function(n){if(!t.has(n)){var r=new Request(n,{credentials:"same-origin"});return fetch(r).then(function(t){if(!t.ok)throw new Error("Request for "+n+" returned a response with status "+t.status);return cleanResponse(t).then(function(t){return e.put(n,t)})})}}))})}).then(function(){return self.skipWaiting()}))}),self.addEventListener("activate",function(e){var t=new Set(urlsToCacheKeys.values());e.waitUntil(caches.open(cacheName).then(function(e){return e.keys().then(function(n){return Promise.all(n.map(function(n){if(!t.has(n.url))return e.delete(n)}))})}).then(function(){return self.clients.claim()}))}),self.addEventListener("fetch",function(e){if("GET"===e.request.method){var t,n=stripIgnoredUrlParameters(e.request.url,ignoreUrlParametersMatching),r="index.html";(t=urlsToCacheKeys.has(n))||(n=addDirectoryIndex(n,r),t=urlsToCacheKeys.has(n));0,t&&e.respondWith(caches.open(cacheName).then(function(e){return e.match(urlsToCacheKeys.get(n)).then(function(e){if(e)return e;throw Error("The cached response that was expected is missing.")})}).catch(function(t){return console.warn('Couldn\'t serve response for "%s" from cache: %O',e.request.url,t),fetch(e.request)}))}}),function(e){if("object"==typeof exports&&"undefined"!=typeof module)module.exports=e();else if("function"==typeof define&&define.amd)define([],e);else{("undefined"!=typeof window?window:"undefined"!=typeof global?global:"undefined"!=typeof self?self:this).toolbox=e()}}(function(){return function e(t,n,r){function o(s,c){if(!n[s]){if(!t[s]){var i="function"==typeof require&&require;if(!c&&i)return i(s,!0);if(a)return a(s,!0);var u=new Error("Cannot find module '"+s+"'");throw u.code="MODULE_NOT_FOUND",u}var f=n[s]={exports:{}};t[s][0].call(f.exports,function(e){var n=t[s][1][e];return o(n||e)},f,f.exports,e,t,n,r)}return n[s].exports}for(var a="function"==typeof require&&require,s=0;s<r.length;s++)o(r[s]);return o}({1:[function(e,t,n){function r(e,t){((t=t||{}).debug||c.debug)&&console.log("[sw-toolbox] "+e)}function o(e){var t;return e&&e.cache&&(t=e.cache.name),t=t||c.cache.name,caches.open(t)}function a(e){var t=Array.isArray(e);if(t&&e.forEach(function(e){"string"==typeof e||e instanceof Request||(t=!1)}),!t)throw new TypeError("The precache method expects either an array of strings and/or Requests or a Promise that resolves to an array of strings and/or Requests.");return e}var s,c=e("./options"),i=e("./idb-cache-expiration");t.exports={debug:r,fetchAndCache:function(e,t){var n=(t=t||{}).successResponses||c.successResponses;return fetch(e.clone()).then(function(a){return"GET"===e.method&&n.test(a.status)&&o(t).then(function(n){n.put(e,a).then(function(){var o,a=t.cache||c.cache;(a.maxEntries||a.maxAgeSeconds)&&a.name&&(o=function(e,t,n){var o=e.url,a=n.maxAgeSeconds,s=n.maxEntries,c=n.name,u=Date.now();return r("Updating LRU order for "+o+". Max entries is "+s+", max age is "+a),i.getDb(c).then(function(e){return i.setTimestampForUrl(e,o,u)}).then(function(e){return i.expireEntries(e,s,a,u)}).then(function(e){r("Successfully updated IDB.");var n=e.map(function(e){return t.delete(e)});return Promise.all(n).then(function(){r("Done with cache cleanup.")})}).catch(function(e){r(e)})}.bind(null,e,n,a),s=s?s.then(o):o())})}),a.clone()})},openCache:o,renameCache:function(e,t,n){return r("Renaming cache: ["+e+"] to ["+t+"]",n),caches.delete(t).then(function(){return Promise.all([caches.open(e),caches.open(t)]).then(function(t){var n=t[0],r=t[1];return n.keys().then(function(e){return Promise.all(e.map(function(e){return n.match(e).then(function(t){return r.put(e,t)})}))}).then(function(){return caches.delete(e)})})})},cache:function(e,t){return o(t).then(function(t){return t.add(e)})},uncache:function(e,t){return o(t).then(function(t){return t.delete(e)})},precache:function(e){e instanceof Promise||a(e),c.preCacheItems=c.preCacheItems.concat(e)},validatePrecacheInput:a,isResponseFresh:function(e,t,n){if(!e)return!1;if(t){var r=e.headers.get("date");if(r&&new Date(r).getTime()+1e3*t<n)return!1}return!0}}},{"./idb-cache-expiration":2,"./options":4}],2:[function(e,t,n){var r="sw-toolbox-",o=1,a="store",s="url",c="timestamp",i={};t.exports={getDb:function(e){return e in i||(i[e]=(t=e,new Promise(function(e,n){var i=indexedDB.open(r+t,o);i.onupgradeneeded=function(){i.result.createObjectStore(a,{keyPath:s}).createIndex(c,c,{unique:!1})},i.onsuccess=function(){e(i.result)},i.onerror=function(){n(i.error)}}))),i[e];var t},setTimestampForUrl:function(e,t,n){return new Promise(function(r,o){var s=e.transaction(a,"readwrite");s.objectStore(a).put({url:t,timestamp:n}),s.oncomplete=function(){r(e)},s.onabort=function(){o(s.error)}})},expireEntries:function(e,t,n,r){return(o=e,i=n,u=r,i?new Promise(function(e,t){var n=1e3*i,r=[],f=o.transaction(a,"readwrite"),l=f.objectStore(a);l.index(c).openCursor().onsuccess=function(e){var t=e.target.result;if(t&&u-n>t.value[c]){var o=t.value[s];r.push(o),l.delete(o),t.continue()}},f.oncomplete=function(){e(r)},f.onabort=t}):Promise.resolve([])).then(function(n){return(r=e,o=t,o?new Promise(function(e,t){var n=[],i=r.transaction(a,"readwrite"),u=i.objectStore(a),f=u.index(c),l=f.count();f.count().onsuccess=function(){var e=l.result;e>o&&(f.openCursor().onsuccess=function(t){var r=t.target.result;if(r){var a=r.value[s];n.push(a),u.delete(a),e-n.length>o&&r.continue()}})},i.oncomplete=function(){e(n)},i.onabort=t}):Promise.resolve([])).then(function(e){return n.concat(e)});var r,o});var o,i,u}}},{}],3:[function(e,t,n){function r(e){return e.reduce(function(e,t){return e.concat(t)},[])}e("serviceworker-cache-polyfill");var o=e("./helpers"),a=e("./router"),s=e("./options");t.exports={fetchListener:function(e){var t=a.match(e.request);t?e.respondWith(t(e.request)):a.default&&"GET"===e.request.method&&0===e.request.url.indexOf("http")&&e.respondWith(a.default(e.request))},activateListener:function(e){o.debug("activate event fired");var t=s.cache.name+"$$$inactive$$$";e.waitUntil(o.renameCache(t,s.cache.name))},installListener:function(e){var t=s.cache.name+"$$$inactive$$$";o.debug("install event fired"),o.debug("creating cache ["+t+"]"),e.waitUntil(o.openCache({cache:{name:t}}).then(function(e){return Promise.all(s.preCacheItems).then(r).then(o.validatePrecacheInput).then(function(t){return o.debug("preCache list: "+(t.join(", ")||"(none)")),e.addAll(t)})}))}}},{"./helpers":1,"./options":4,"./router":6,"serviceworker-cache-polyfill":16}],4:[function(e,t,n){var r;r=self.registration?self.registration.scope:self.scope||new URL("./",self.location).href,t.exports={cache:{name:"$$$toolbox-cache$$$"+r+"$$$",maxAgeSeconds:null,maxEntries:null},debug:!1,networkTimeoutSeconds:null,preCacheItems:[],successResponses:/^0|([123]\d\d)|(40[14567])|410$/}},{}],5:[function(e,t,n){var r=new URL("./",self.location).pathname,o=e("path-to-regexp"),a=function(e,t,n,a){t instanceof RegExp?this.fullUrlRegExp=t:(0!==t.indexOf("/")&&(t=r+t),this.keys=[],this.regexp=o(t,this.keys)),this.method=e,this.options=a,this.handler=n};a.prototype.makeHandler=function(e){var t;if(this.regexp){var n=this.regexp.exec(e);t={},this.keys.forEach(function(e,r){t[e.name]=n[r+1]})}return function(e){return this.handler(e,t,this.options)}.bind(this)},t.exports=a},{"path-to-regexp":15}],6:[function(e,t,n){var r=e("./route"),o=e("./helpers"),a=function(e,t){for(var n=e.entries(),r=n.next(),o=[];!r.done;){new RegExp(r.value[0]).test(t)&&o.push(r.value[1]),r=n.next()}return o},s=function(){this.routes=new Map,this.routes.set(RegExp,new Map),this.default=null};["get","post","put","delete","head","any"].forEach(function(e){s.prototype[e]=function(t,n,r){return this.add(e,t,n,r)}}),s.prototype.add=function(e,t,n,a){var s;a=a||{},t instanceof RegExp?s=RegExp:s=(s=a.origin||self.location.origin)instanceof RegExp?s.source:s.replace(/[-\/\\^$*+?.()|[\]{}]/g,"\\$&"),e=e.toLowerCase();var c=new r(e,t,n,a);this.routes.has(s)||this.routes.set(s,new Map);var i=this.routes.get(s);i.has(e)||i.set(e,new Map);var u=i.get(e),f=c.regexp||c.fullUrlRegExp;u.has(f.source)&&o.debug('"'+t+'" resolves to same regex as existing route.'),u.set(f.source,c)},s.prototype.matchMethod=function(e,t){var n=new URL(t),r=n.origin,o=n.pathname;return this._match(e,a(this.routes,r),o)||this._match(e,[this.routes.get(RegExp)],t)},s.prototype._match=function(e,t,n){if(0===t.length)return null;for(var r=0;r<t.length;r++){var o=t[r],s=o&&o.get(e.toLowerCase());if(s){var c=a(s,n);if(c.length>0)return c[0].makeHandler(n)}}return null},s.prototype.match=function(e){return this.matchMethod(e.method,e.url)||this.matchMethod("any",e.url)},t.exports=new s},{"./helpers":1,"./route":5}],7:[function(e,t,n){var r=e("../options"),o=e("../helpers");t.exports=function(e,t,n){return n=n||{},o.debug("Strategy: cache first ["+e.url+"]",n),o.openCache(n).then(function(t){return t.match(e).then(function(t){var a=n.cache||r.cache,s=Date.now();return o.isResponseFresh(t,a.maxAgeSeconds,s)?t:o.fetchAndCache(e,n)})})}},{"../helpers":1,"../options":4}],8:[function(e,t,n){var r=e("../options"),o=e("../helpers");t.exports=function(e,t,n){return n=n||{},o.debug("Strategy: cache only ["+e.url+"]",n),o.openCache(n).then(function(t){return t.match(e).then(function(e){var t=n.cache||r.cache,a=Date.now();if(o.isResponseFresh(e,t.maxAgeSeconds,a))return e})})}},{"../helpers":1,"../options":4}],9:[function(e,t,n){var r=e("../helpers"),o=e("./cacheOnly");t.exports=function(e,t,n){return r.debug("Strategy: fastest ["+e.url+"]",n),new Promise(function(a,s){var c=!1,i=[],u=function(e){i.push(e.toString()),c?s(new Error('Both cache and network failed: "'+i.join('", "')+'"')):c=!0},f=function(e){e instanceof Response?a(e):u("No result returned")};r.fetchAndCache(e.clone(),n).then(f,u),o(e,t,n).then(f,u)})}},{"../helpers":1,"./cacheOnly":8}],10:[function(e,t,n){t.exports={networkOnly:e("./networkOnly"),networkFirst:e("./networkFirst"),cacheOnly:e("./cacheOnly"),cacheFirst:e("./cacheFirst"),fastest:e("./fastest")}},{"./cacheFirst":7,"./cacheOnly":8,"./fastest":9,"./networkFirst":11,"./networkOnly":12}],11:[function(e,t,n){var r=e("../options"),o=e("../helpers");t.exports=function(e,t,n){var a=(n=n||{}).successResponses||r.successResponses,s=n.networkTimeoutSeconds||r.networkTimeoutSeconds;return o.debug("Strategy: network first ["+e.url+"]",n),o.openCache(n).then(function(t){var c,i,u=[];if(s){var f=new Promise(function(a){c=setTimeout(function(){t.match(e).then(function(e){var t=n.cache||r.cache,s=Date.now(),c=t.maxAgeSeconds;o.isResponseFresh(e,c,s)&&a(e)})},1e3*s)});u.push(f)}var l=o.fetchAndCache(e,n).then(function(e){if(c&&clearTimeout(c),a.test(e.status))return e;throw o.debug("Response was an HTTP error: "+e.statusText,n),i=e,new Error("Bad response")}).catch(function(r){return o.debug("Network or response error, fallback to cache ["+e.url+"]",n),t.match(e).then(function(e){if(e)return e;if(i)return i;throw r})});return u.push(l),Promise.race(u)})}},{"../helpers":1,"../options":4}],12:[function(e,t,n){var r=e("../helpers");t.exports=function(e,t,n){return r.debug("Strategy: network only ["+e.url+"]",n),fetch(e)}},{"../helpers":1}],13:[function(e,t,n){var r=e("./options"),o=e("./router"),a=e("./helpers"),s=e("./strategies"),c=e("./listeners");a.debug("Service Worker Toolbox is loading"),self.addEventListener("install",c.installListener),self.addEventListener("activate",c.activateListener),self.addEventListener("fetch",c.fetchListener),t.exports={networkOnly:s.networkOnly,networkFirst:s.networkFirst,cacheOnly:s.cacheOnly,cacheFirst:s.cacheFirst,fastest:s.fastest,router:o,options:r,cache:a.cache,uncache:a.uncache,precache:a.precache}},{"./helpers":1,"./listeners":3,"./options":4,"./router":6,"./strategies":10}],14:[function(e,t,n){t.exports=Array.isArray||function(e){return"[object Array]"==Object.prototype.toString.call(e)}},{}],15:[function(e,t,n){function r(e,t){for(var n,r=[],o=0,a=0,c="",i=t&&t.delimiter||"/";null!=(n=h.exec(e));){var u=n[0],f=n[1],l=n.index;if(c+=e.slice(a,l),a=l+u.length,f)c+=f[1];else{var p=e[a],d=n[2],m=n[3],g=n[4],v=n[5],b=n[6],w=n[7];c&&(r.push(c),c="");var x=null!=d&&null!=p&&p!==d,y="+"===b||"*"===b,E="?"===b||"*"===b,R=n[2]||i,C=g||v;r.push({name:m||o++,prefix:d||"",delimiter:R,optional:E,repeat:y,partial:x,asterisk:!!w,pattern:C?(k=C,k.replace(/([=!:$\/()])/g,"\\$1")):w?".*":"[^"+s(R)+"]+?"})}}var k;return a<e.length&&(c+=e.substr(a)),c&&r.push(c),r}function o(e){return encodeURI(e).replace(/[\/?#]/g,function(e){return"%"+e.charCodeAt(0).toString(16).toUpperCase()})}function a(e){for(var t=new Array(e.length),n=0;n<e.length;n++)"object"==typeof e[n]&&(t[n]=new RegExp("^(?:"+e[n].pattern+")$"));return function(n,r){for(var a="",s=n||{},c=(r||{}).pretty?o:encodeURIComponent,i=0;i<e.length;i++){var u=e[i];if("string"!=typeof u){var f,h=s[u.name];if(null==h){if(u.optional){u.partial&&(a+=u.prefix);continue}throw new TypeError('Expected "'+u.name+'" to be defined')}if(l(h)){if(!u.repeat)throw new TypeError('Expected "'+u.name+'" to not repeat, but received `'+JSON.stringify(h)+"`");if(0===h.length){if(u.optional)continue;throw new TypeError('Expected "'+u.name+'" to not be empty')}for(var p=0;p<h.length;p++){if(f=c(h[p]),!t[i].test(f))throw new TypeError('Expected all "'+u.name+'" to match "'+u.pattern+'", but received `'+JSON.stringify(f)+"`");a+=(0===p?u.prefix:u.delimiter)+f}}else{if(f=u.asterisk?encodeURI(h).replace(/[?#]/g,function(e){return"%"+e.charCodeAt(0).toString(16).toUpperCase()}):c(h),!t[i].test(f))throw new TypeError('Expected "'+u.name+'" to match "'+u.pattern+'", but received "'+f+'"');a+=u.prefix+f}}else a+=u}return a}}function s(e){return e.replace(/([.+*?=^!:${}()[\]|\/\\])/g,"\\$1")}function c(e,t){return e.keys=t,e}function i(e){return e.sensitive?"":"i"}function u(e,t,n){l(t)||(n=t||n,t=[]);for(var r=(n=n||{}).strict,o=!1!==n.end,a="",u=0;u<e.length;u++){var f=e[u];if("string"==typeof f)a+=s(f);else{var h=s(f.prefix),p="(?:"+f.pattern+")";t.push(f),f.repeat&&(p+="(?:"+h+p+")*"),a+=p=f.optional?f.partial?h+"("+p+")?":"(?:"+h+"("+p+"))?":h+"("+p+")"}}var d=s(n.delimiter||"/"),m=a.slice(-d.length)===d;return r||(a=(m?a.slice(0,-d.length):a)+"(?:"+d+"(?=$))?"),a+=o?"$":r&&m?"":"(?="+d+"|$)",c(new RegExp("^"+a,i(n)),t)}function f(e,t,n){return l(t)||(n=t||n,t=[]),n=n||{},e instanceof RegExp?function(e,t){var n=e.source.match(/\((?!\?)/g);if(n)for(var r=0;r<n.length;r++)t.push({name:r,prefix:null,delimiter:null,optional:!1,repeat:!1,partial:!1,asterisk:!1,pattern:null});return c(e,t)}(e,t):l(e)?function(e,t,n){for(var r=[],o=0;o<e.length;o++)r.push(f(e[o],t,n).source);return c(new RegExp("(?:"+r.join("|")+")",i(n)),t)}(e,t,n):(o=t,u(r(e,a=n),o,a));var o,a}var l=e("isarray");t.exports=f,t.exports.parse=r,t.exports.compile=function(e,t){return a(r(e,t))},t.exports.tokensToFunction=a,t.exports.tokensToRegExp=u;var h=new RegExp(["(\\\\.)","([\\/.])?(?:(?:\\:(\\w+)(?:\\(((?:\\\\.|[^\\\\()])+)\\))?|\\(((?:\\\\.|[^\\\\()])+)\\))([+*?])?|(\\*))"].join("|"),"g")},{isarray:14}],16:[function(e,t,n){!function(){var e=Cache.prototype.addAll,t=navigator.userAgent.match(/(Firefox|Chrome)\/(\d+\.)/);if(t)var n=t[1],r=parseInt(t[2]);e&&(!t||"Firefox"===n&&r>=46||"Chrome"===n&&r>=50)||(Cache.prototype.addAll=function(e){function t(e){this.name="NetworkError",this.code=19,this.message=e}var n=this;return t.prototype=Object.create(Error.prototype),Promise.resolve().then(function(){if(arguments.length<1)throw new TypeError;return e=e.map(function(e){return e instanceof Request?e:String(e)}),Promise.all(e.map(function(e){"string"==typeof e&&(e=new Request(e));var n=new URL(e.url).protocol;if("http:"!==n&&"https:"!==n)throw new t("Invalid scheme");return fetch(e.clone())}))}).then(function(r){if(r.some(function(e){return!e.ok}))throw new t("Incorrect response status");return Promise.all(r.map(function(t,r){return n.put(e[r],t)}))}).then(function(){})},Cache.prototype.add=function(e){return this.addAll([e])})}()},{}]},{},[13])(13)}),toolbox.router.get(/^https:\/\/fonts\.googleapis\.com\//,toolbox.cacheFirst,{});