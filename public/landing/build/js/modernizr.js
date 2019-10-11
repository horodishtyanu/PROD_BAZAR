!function(e,t,n){function r(e,t){return typeof e===t}function s(){return"function"!=typeof t.createElement?t.createElement(arguments[0]):x?t.createElementNS.call(t,"http://www.w3.org/2000/svg",arguments[0]):t.createElement.apply(t,arguments)}function o(e,t){return!!~(""+e).indexOf(t)}function i(){var e=t.body;return e||(e=s(x?"svg":"body"),e.fake=!0),e}function a(e,n,r,o){var a,l,f,u,c="modernizr",d=s("div"),p=i();if(parseInt(r,10))for(;r--;)f=s("div"),f.id=o?o[r]:c+(r+1),d.appendChild(f);return a=s("style"),a.type="text/css",a.id="s"+c,(p.fake?p:d).appendChild(a),p.appendChild(d),a.styleSheet?a.styleSheet.cssText=e:a.appendChild(t.createTextNode(e)),d.id=c,p.fake&&(p.style.background="",p.style.overflow="hidden",u=w.style.overflow,w.style.overflow="hidden",w.appendChild(p)),l=n(d,e),p.fake?(p.parentNode.removeChild(p),w.style.overflow=u,w.offsetHeight):d.parentNode.removeChild(d),!!l}function l(e){return e.replace(/([A-Z])/g,function(e,t){return"-"+t.toLowerCase()}).replace(/^ms-/,"-ms-")}function f(t,n,r){var s;if("getComputedStyle"in e){s=getComputedStyle.call(e,t,n);var o=e.console;if(null!==s)r&&(s=s.getPropertyValue(r));else if(o){var i=o.error?"error":"log";o[i].call(o,"getComputedStyle returning null, its possible modernizr test results are inaccurate")}}else s=!n&&t.currentStyle&&t.currentStyle[r];return s}function u(t,r){var s=t.length;if("CSS"in e&&"supports"in e.CSS){for(;s--;)if(e.CSS.supports(l(t[s]),r))return!0;return!1}if("CSSSupportsRule"in e){for(var o=[];s--;)o.push("("+l(t[s])+":"+r+")");return o=o.join(" or "),a("@supports ("+o+") { #modernizr { position: absolute; } }",function(e){return"absolute"==f(e,null,"position")})}return n}function c(e){return e.replace(/([a-z])-([a-z])/g,function(e,t,n){return t+n.toUpperCase()}).replace(/^-/,"")}function d(e,t,i,a){function l(){d&&(delete z.style,delete z.modElem)}if(a=!r(a,"undefined")&&a,!r(i,"undefined")){var f=u(e,i);if(!r(f,"undefined"))return f}for(var d,p,m,v,y,g=["modernizr","tspan","samp"];!z.style&&g.length;)d=!0,z.modElem=s(g.shift()),z.style=z.modElem.style;for(m=e.length,p=0;m>p;p++)if(v=e[p],y=z.style[v],o(v,"-")&&(v=c(v)),z.style[v]!==n){if(a||r(i,"undefined"))return l(),"pfx"!=t||v;try{z.style[v]=i}catch(e){}if(z.style[v]!=y)return l(),"pfx"!=t||v}return l(),!1}function p(e,t){return function(){return e.apply(t,arguments)}}function m(e,t,n){var s;for(var o in e)if(e[o]in t)return!1===n?e[o]:(s=t[e[o]],r(s,"function")?p(s,n||t):s);return!1}function v(e,t,n,s,o){var i=e.charAt(0).toUpperCase()+e.slice(1),a=(e+" "+b.join(i+" ")+i).split(" ");return r(t,"string")||r(t,"undefined")?d(a,t,s,o):(a=(e+" "+E.join(i+" ")+i).split(" "),m(a,t,n))}function y(e,t,r){return v(e,n,n,t,r)}var g=[],h={_version:"3.6.0",_config:{classPrefix:"",enableClasses:!0,enableJSClass:!0,usePrefixes:!0},_q:[],on:function(e,t){var n=this;setTimeout(function(){t(n[e])},0)},addTest:function(e,t,n){g.push({name:e,fn:t,options:n})},addAsyncTest:function(e){g.push({name:null,fn:e})}},C=function(){};C.prototype=h,C=new C;var S=[],w=t.documentElement,x="svg"===w.nodeName.toLowerCase(),_=h._config.usePrefixes?" -webkit- -moz- -o- -ms- ".split(" "):["",""];h._prefixes=_,C.addTest("opacity",function(){var e=s("a").style;return e.cssText=_.join("opacity:.55;"),/^0.55$/.test(e.opacity)});var T="Moz O ms Webkit",b=h._config.usePrefixes?T.split(" "):[];h._cssomPrefixes=b;var P={elem:s("modernizr")};C._q.push(function(){delete P.elem});var z={style:P.elem.style};C._q.unshift(function(){delete z.style});var E=h._config.usePrefixes?T.toLowerCase().split(" "):[];h._domPrefixes=E,h.testAllProps=v,h.testAllProps=y,C.addTest("csstransitions",y("transition","all",!0)),C.addTest("csstransforms",function(){return-1===navigator.userAgent.indexOf("Android 2.")&&y("transform","scale(1)",!0)}),C.addTest("localstorage",function(){var e="modernizr";try{return localStorage.setItem(e,e),localStorage.removeItem(e),!0}catch(e){return!1}}),C.addTest("filereader",!!(e.File&&e.FileList&&e.FileReader)),C.addTest("csspointerevents",function(){var e=s("a").style;return e.cssText="pointer-events:auto","auto"===e.pointerEvents}),function(){var e,t,n,s,o,i,a;for(var l in g)if(g.hasOwnProperty(l)){if(e=[],t=g[l],t.name&&(e.push(t.name.toLowerCase()),t.options&&t.options.aliases&&t.options.aliases.length))for(n=0;n<t.options.aliases.length;n++)e.push(t.options.aliases[n].toLowerCase());for(s=r(t.fn,"function")?t.fn():t.fn,o=0;o<e.length;o++)i=e[o],a=i.split("."),1===a.length?C[a[0]]=s:(!C[a[0]]||C[a[0]]instanceof Boolean||(C[a[0]]=new Boolean(C[a[0]])),C[a[0]][a[1]]=s),S.push((s?"":"no-")+a.join("-"))}}(),function(e){var t=w.className,n=C._config.classPrefix||"";if(x&&(t=t.baseVal),C._config.enableJSClass){var r=new RegExp("(^|\\s)"+n+"no-js(\\s|$)");t=t.replace(r,"$1"+n+"js$2")}C._config.enableClasses&&(t+=" "+n+e.join(" "+n),x?w.className.baseVal=t:w.className=t)}(S),delete h.addTest,delete h.addAsyncTest;for(var j=0;j<C._q.length;j++)C._q[j]();e.Modernizr=C}(window,document);