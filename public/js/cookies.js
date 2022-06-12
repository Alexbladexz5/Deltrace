/**
 * ESTE ES EL ARCHIVO DE CONFIGURACIÓN DE LAS COOKIES, DONDE TENEMOS TANTO LA VISTA
 * COMO LA FUNCIONALIDAD DE LA MISMA. PARA CAMBIAR CUALQUIER CONFIGURACIÓN
 * CAMBIA LOS VALORES DE ESTE SCRIPT
 * 
 * SCRIPT REALIZADO POR FMREDONDO -> https://fmredondo.com
 * 
 */

 const HEADER = document.getElementsByTagName('head')[0]
 const BODY = document.getElementsByTagName('body')[0]
 const COOKIES_STYLE = '/css/cookies.css'
 dataLayer = []
 
 const mensajeCookies = `<section class='cookies d-none' id='panelAvisoCookies'>
     <img src='/img/cookie.svg' alt='cookie'>
     <p class='tituloCookies'>Cookies</p>
     <p class='textoCookies'>
         Utilizamos cookies propias y de terceros para obtener datos estadísticos de la navegación de nuestros usuarios y
         mejorar nuestros servicios. Si no las aceptas no podrás navegar por la web.
     </p>
     <div class='botonesCookies'>
         <button class='btn-AceptarCookies' id='btnAceptarCookies'>Aceptar Todas</button>
     </div>
     </section>
 
     <section class='panelCookies' id='panelCookies'></section>`
 
 const index = () => {
     HEADER.insertAdjacentHTML('beforebegin', `<link rel='stylesheet' href='${COOKIES_STYLE}'>`)
     BODY.insertAdjacentHTML('afterbegin', mensajeCookies)
 
 
     const AVISO_COOKIES = document.getElementById('panelAvisoCookies')
     const PANEL_COOKIES = document.getElementById('panelCookies')
     const BTN_ACEPTAR_COOKIES = document.getElementById('btnAceptarCookies')
 
     if(!localStorage.getItem('cookies-aceptadas')){
         AVISO_COOKIES.classList.add('cookiesActivadas')
         PANEL_COOKIES.classList.add('cookiesActivadas')
         AVISO_COOKIES.classList.remove('d-none')
     }
     else{
         dataLayer.push({'event': 'cookies-aceptadas'})
     }
 
     BTN_ACEPTAR_COOKIES.addEventListener('click', () => {
         AVISO_COOKIES.classList.remove('cookiesActivadas')
         PANEL_COOKIES.classList.remove('cookiesActivadas')
 
         localStorage.setItem('cookies-aceptadas', true)
         dataLayer.push({'event': 'cookies-aceptadas'})
     })
 }
 
 document.addEventListener('DOMContentLoaded', index)