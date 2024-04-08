   <?php include(get_template_directory() . '/components/search-panel.php'); ?>

   <!-- menu mobile -->
   <div id="menu-mobile" class="p-8 fixed w-screen min-h-screen backdrop-blur-2xl z-30 -translate-x-full transform transition-transform duration-300 flex flex-col justify-center">
       <div class="overflow-scroll max-h-[800px]">
           <ul class="space-y-8">
               <li class="relative">
                   <button class="font-medium tracking-wide text-gray-100 transition-colors duration-200 hover:text-purple-500 dropdown-btn flex items-center">Product <span class="material-symbols-outlined dropdown-icon">expand_more</span></button>
                   <ul class="dropdown-menu hidden left-0 bg-gray-700/[0.5] rounded-lg p-2 text-sm mt-4">
                       <li><a href="#" class="block py-2.5 px-4 rounded transition duration-200 text-gray-300 hover:bg-purple-500 hover:text-white">Company</a></li>
                       <li><a href="#" class="block py-2.5 px-4 rounded transition duration-200 text-gray-300 hover:bg-purple-500 hover:text-white">Team</a></li>
                       <li><a href="#" class="block py-2.5 px-4 rounded transition duration-200 text-gray-300 hover:bg-purple-500 hover:text-white">Careers</a></li>
                       <li><a href="#" class="block py-2.5 px-4 rounded transition duration-200 text-gray-300 hover:bg-purple-500 hover:text-white">Serum</a></li>
                   </ul>
               </li>
               <li class="relative">
                   <button class="font-medium tracking-wide text-gray-100 transition-colors duration-200 hover:text-purple-500 dropdown-btn flex items-center">Features <span class="material-symbols-outlined dropdown-icon">expand_more</span></button>
                   <ul class="dropdown-menu hidden left-0 bg-gray-700/[0.5] rounded-lg p-2 text-sm mt-4">
                       <li><a href="#" class="block py-2.5 px-4 rounded transition duration-200 text-gray-300 hover:bg-purple-500 hover:text-white">Company</a></li>
                       <li><a href="#" class="block py-2.5 px-4 rounded transition duration-200 text-gray-300 hover:bg-purple-500 hover:text-white">Team</a></li>
                       <li><a href="#" class="block py-2.5 px-4 rounded transition duration-200 text-gray-300 hover:bg-purple-500 hover:text-white">Careers</a></li>
                       <li><a href="#" class="block py-2.5 px-4 rounded transition duration-200 text-gray-300 hover:bg-purple-500 hover:text-white">Serum</a></li>
                       <li><a href="#" class="block py-2.5 px-4 rounded transition duration-200 text-gray-300 hover:bg-purple-500 hover:text-white">Massive</a></li>
                   </ul>
               </li>
               <li><a href="/" class="font-medium tracking-wide text-gray-100 transition-colors duration-200 hover:text-purple-500">Pricing</a></li>
               <li><a href="/" class="font-medium tracking-wide text-gray-100 transition-colors duration-200 hover:text-purple-500">About us</a></li>
           </ul>

           <ul class="space-y-8 mt-8">
               <div class="flex-1 gap-x-6 items-center justify-end mt-6 space-y-6 md:flex md:space-y-0 md:mt-0">
                   <div class="flex items-center gap-2">
                       <a href="" class="bg-gray-800 hover:bg-gray-700 duration-200 p-2 rounded-full flex flex-col justify-center text-gray-200"><span class="material-symbols-outlined"> favorite </span></a>
                       <a href="" class="bg-purple-500 hover:bg-gray-700 duration-200 p-2 rounded-full flex flex-col justify-center text-gray-200"><span class="material-symbols-outlined"> shopping_cart </span></a>
                   </div>
                   <a href="javascript:void(0)" class="flex items-center justify-center gap-x-1 py-2 px-4 text-white font-medium bg-gray-600 hover:bg-gray-700 active:bg-gray-900/75 rounded-full md:inline-flex" rel="nofollow"> Login </a>
                   <a href="javascript:void(0)" class="flex items-center justify-center gap-x-1 py-2 px-4 text-white font-medium bg-purple-500 hover:bg-gray-700 active:bg-gray-900/75 rounded-full md:inline-flex" rel="nofollow">
                       Sign up
                       <span class="material-symbols-outlined"> login </span>
                   </a>
               </div>
           </ul>
           <button class="search-button text-gray-100 w-fit mx-auto mt-8 bg-purple-500 flex flex-col justify-center p-2 rounded-full"><span class="material-symbols-outlined"> search </span></button>
       </div>
   </div>

   <!-- navbar -->
   <nav class="md:text-sm z-30 relative">
       <div class="gap-x-14 items-center max-w-screen-xl mx-auto px-4 md:flex md:px-8">
           <div class="flex items-center justify-between py-5 md:block">
               <!-- logo -->
               <a href="home.php" rel="nofollow">
                   <img src="../assets/img/logo.svg" alt="logo">
               </a>
               <!-- hamburger mobile -->
               <div class="md:hidden">
                   <button id="hamburger" class="menu-btn text-gray-300 hover:text-gray-100"><span class="material-symbols-outlined scale-150">menu</span></button>
               </div>
           </div>
           <!-- menu -->
           <div class="flex-1 items-center mt-8 md:mt-0 md:flex hidden">
               <?php
                // Stampare il menu principale
                wp_nav_menu(array(
                    'theme_location' => 'primary', // Impostare il nome della posizione del menu che corrisponde a quella assegnata nel pannello di amministrazione
                    'menu_class' => 'justify-center items-center md:flex md:space-x-6', // Aggiungere classi CSS al menu
                    'container' => false, // Non aggiungere un wrapper al menu
                ));

                // Resettare i parametri del menu dopo aver stampato il menu principale
                wp_reset_query();
                ?>

               <ul class="justify-center items-center md:flex md:space-x-6">
                   <li>
                       <div aria-label="About" title="About" class="cursor-pointer text-gray-300 transition-colors duration-200 hover:text-purple-500 group relative">
                           <div class="flex">About<span class="material-symbols-outlined transform transition-transform duration-300 group-hover:rotate-180">expand_more</span></div>
                           <div class="hidden group-hover:block absolute w-40 bg-gray-900/[0.9] rounded-lg p-2 text-sm">
                               <ul>
                                   <li><a href="#" class="block py-2.5 px-4 rounded transition duration-200 text-gray-300 hover:bg-purple-500 hover:text-white">Company</a></li>
                                   <li><a href="#" class="block py-2.5 px-4 rounded transition duration-200 text-gray-300 hover:bg-purple-500 hover:text-white">Team</a></li>
                                   <li><a href="#" class="block py-2.5 px-4 rounded transition duration-200 text-gray-300 hover:bg-purple-500 hover:text-white">Careers</a></li>
                                   <li><a href="#" class="block py-2.5 px-4 rounded transition duration-200 text-gray-300 hover:bg-purple-500 hover:text-white">Serum</a></li>
                               </ul>
                           </div>
                       </div>
                   </li>
                   <li>
                       <div aria-label="Integrations" title="Integrations" class="cursor-pointer text-gray-300 transition-colors duration-200 hover:text-purple-500 group relative">
                           <div class="flex">Integrations<span class="material-symbols-outlined transform transition-transform duration-300 group-hover:rotate-180">expand_more</span></div>
                           <div class="hidden group-hover:block absolute w-40 bg-gray-900/[0.9] rounded-lg p-2 text-sm">
                               <ul>
                                   <li><a href="#" class="block py-2.5 px-4 rounded transition duration-200 text-gray-300 hover:bg-purple-500 hover:text-white">Company</a></li>
                                   <li><a href="#" class="block py-2.5 px-4 rounded transition duration-200 text-gray-300 hover:bg-purple-500 hover:text-white">Team</a></li>
                                   <li><a href="#" class="block py-2.5 px-4 rounded transition duration-200 text-gray-300 hover:bg-purple-500 hover:text-white">Careers</a></li>
                               </ul>
                           </div>
                       </div>
                   </li>
                   <li>
                       <div aria-label="Customers" title="Customers" class="cursor-pointer text-gray-300 transition-colors duration-200 hover:text-purple-500 group relative">
                           <div class="flex items-center">Customers<span class="material-symbols-outlined transform transition-transform duration-300 group-hover:rotate-180">expand_more</span></div>
                           <div class="hidden group-hover:block absolute w-40 bg-gray-900/[0.9] rounded-lg p-2 text-sm">
                               <ul>
                                   <li><a href="#" class="block py-2.5 px-4 rounded transition duration-200 text-gray-300 hover:bg-purple-500 hover:text-white">Company</a></li>
                                   <li><a href="#" class="block py-2.5 px-4 rounded transition duration-200 text-gray-300 hover:bg-purple-500 hover:text-white">Team</a></li>
                                   <li><a href="#" class="block py-2.5 px-4 rounded transition duration-200 text-gray-300 hover:bg-purple-500 hover:text-white">Careers</a></li>
                               </ul>
                           </div>
                       </div>
                   </li>
                   <li>
                       <div aria-label="Pricing" title="Pricing" class="cursor-pointer text-gray-300 transition-colors duration-200 hover:text-purple-500 group relative">
                           <div class="flex">Pricing<span></span></div>
                       </div>
                   </li>
               </ul>
               <div class="flex-1 gap-x-6 items-center justify-end mt-6 space-y-6 md:flex md:space-y-0 md:mt-0">
                   <div class="flex items-center gap-2">
                       <a href="" class="bg-gray-800 hover:bg-gray-700 duration-200 p-2 rounded-full flex flex-col justify-center text-gray-200"><span class="material-symbols-outlined"> favorite </span></a>
                       <a href="" class="bg-purple-500 hover:bg-gray-700 duration-200 p-2 rounded-full flex flex-col justify-center text-gray-200"><span class="material-symbols-outlined"> shopping_cart </span></a>
                   </div>
                   <a href="../login.php" class="block text-gray-200 hover:text-purple-500" rel="nofollow">Log in</a>
                   <a href="../login.php" class="flex items-center justify-center gap-x-1 py-2 px-4 text-white font-medium bg-purple-500 hover:bg-gray-700 active:bg-gray-900/75 rounded-full md:inline-flex duration-200" rel="nofollow">
                       Sign up
                       <span class="material-symbols-outlined"> login </span>
                   </a>
                   <button class="search-button text-gray-100"><span class="material-symbols-outlined"> search </span></button>
               </div>
           </div>
       </div>
   </nav>