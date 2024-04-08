<!-- search panel -->
<div id="search-panel" class="fixed w-screen h-screen backdrop-blur-2xl z-40 flex flex-col justify-center translate-y-full transform transition-transform duration-300">
    <div class="mx-auto max-w-xl">
        <form id="search-form" action="<?php echo esc_url(home_url('/')); ?>" method="get" class="max-w-xl px-4 mx-auto mt-12">
            <div class="relative">
                <span class="material-symbols-outlined absolute top-0 bottom-0 w-6 h-6 my-auto text-gray-200 left-3">
                    search
                </span>
                <input id="search-bar" type="text" name="s" placeholder="Search" class="lg:w-[600px] w-[300px] py-3 pl-12 pr-4 text-gray-200 border-gray-300 border-b outline-none bg-transparent focus:border-purple-600" />
            </div>
        </form>
    </div>
</div>