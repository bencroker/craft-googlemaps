(()=>{var e=["","ipstack","maxmind"],i=document.getElementById("settings-geolocation-service");window.updateGeolocationService=function(){var t=i.value;if(-1!==e.indexOf(t)){var n={ipstack:document.getElementById("settings-ipstack"),maxmind:document.getElementById("settings-maxmind")};n.ipstack.style.display="none",n.maxmind.style.display="none",t&&(n[t].style.display="block")}else console.log("Invalid service specified.")}})();