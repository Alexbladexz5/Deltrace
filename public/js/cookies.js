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
         mejorar nuestros servicios. Si no las aceptas no podrás navegar por la web de forma correcta. Puede cambiar la
         configuración u obtener más información <a href='#'>aquí</a>.
     </p>
     <div class='botonesCookies'>
         <button class='btn-editarCookies' id='btnEditarCookies'><i class='fas fa-cogs'></i></button>
         <button class='btn-AceptarCookies' id='btnAceptarCookies'>Aceptar Todas</button>
     </div>
     </section>
 
     <section class='panelCookies' id='panelCookies'></section>`
 
     const editarCookies = `
     <div class="d-flex align-items-start editarCookies d-none" id='panelEditarCookies'>
         <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
             <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Necesarias</button>
             <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Marketing</button>
             <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Analiticas</button>
             <button class="nav-link bg-success text-white mt-3" id="guardarCookies"  type="button" aria-controls="v-pills-settings" aria-selected="false">Guardar y cerrar</button>
         </div>
         <div class="tab-content" id="v-pills-tabContent">
             <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                 <p>Las cookies necesarias ayudan a hacer que una web sea utilizable al activar funciones básicas, como la navegación por la página y el acceso a áreas seguras de la web. La web no puede funcionar correctamente sin estas cookies.</p>
             </div>
             <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                 <p>Las cookies de marketing se utilizan para rastrear a los visitantes a través de las webs. La intención es mostrar anuncios que sean relevantes y atractivos para el usuario individual y, por tanto, más valiosos para los editores y los anunciantes de terceros.
                 No se usan cookies de este tipo.</p>
             </div>
             <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                 <p>Las cookies de análisis ayudan a los propietarios de las webs a comprender cómo interactúan los visitantes con las webs recopilando y facilitando información de forma anónima.</p>
                 <div class="form-check form-switch">
                     <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" />
                     <label class="form-check-label" for="flexSwitchCheckDefault">Aceptar cookies de análisis</label>
                 </div>
             </div>
         </div>
     </div>`
 
 const index = () => {
     HEADER.insertAdjacentHTML('beforebegin', `<link rel='stylesheet' href='${COOKIES_STYLE}'>`)
     BODY.insertAdjacentHTML('afterbegin', mensajeCookies)
 
 
     const AVISO_COOKIES = document.getElementById('panelAvisoCookies')
     const PANEL_COOKIES = document.getElementById('panelCookies')
     const BTN_ACEPTAR_COOKIES = document.getElementById('btnAceptarCookies')
     const BTN_EDITAR_COOKIES = document.getElementById('btnEditarCookies')
     const GESTIONAR_COOKIES = document.getElementById('gestionarCookies')
 
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
 
     BTN_EDITAR_COOKIES.addEventListener('click', () => {
         AVISO_COOKIES.classList.remove('cookiesActivadas')
         BODY.insertAdjacentHTML('afterbegin', editarCookies)
        const PANEL_EDITAR_COOKIES = document.getElementById('panelEditarCookies')
        PANEL_EDITAR_COOKIES.classList.remove('d-none')
 
        document.getElementById('guardarCookies').addEventListener('click', () => {
             console.log(PANEL_EDITAR_COOKIES)
             PANEL_EDITAR_COOKIES.classList.add('d-none')
             PANEL_COOKIES.classList.remove('cookiesActivadas')
             localStorage.setItem('cookies-aceptadas', true)
 
        })
     })
 
     GESTIONAR_COOKIES.addEventListener('click', () => {
         AVISO_COOKIES.classList.add('cookiesActivadas')
         AVISO_COOKIES.classList.remove('d-none')
         PANEL_COOKIES.classList.add('cookiesActivadas')
 
         localStorage.removeItem('cookies-aceptadas')
     })
 
 }
 
 document.addEventListener('DOMContentLoaded', index)