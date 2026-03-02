<header id="mainHeader" class="sticky top-0 z-[9999] border-b border-black/10 bg-white/70 backdrop-blur transition-all duration-500 ease-in-out">
  <div id="headerContainer" class="w-[90%] mx-auto flex items-center justify-between transition-all duration-500 ease-in-out">
    <a href="<?php echo ROOT_URL; ?>/" class="flex items-center gap-3 hover:-translate-y-[0.2rem] transition-all duration-500 ease-in-out">
      <div class="h-10 w-10 xl:w-18 xl:h-18 rounded-xl bg-white ring-1 ring-black/10 grid place-items-center xl:my-1">
        <img src="<?php echo url('assets/images/logo.webp'); ?>" alt="Corpsec Investigation" class="h-9 w-9 xl:w-16 xl:h-16">
      </div>
      <div class="leading-tight">
        <div class="text-sm xl:text-lg font-semibold tracking-wide">
          Corpsec Investigations<br> & Guarding Services
        </div>
        <div class="text-xs xl:text-md text-zinc-500 tracking-tighter">Observe. Protect. Expose.</div>
      </div>
    </a>

    <nav class="hidden items-center gap-1 lg:flex text-sm xl:text-lg">
      <a href="<?php echo ROOT_URL; ?>/about" class="inline-flex items-center rounded-xl px-3 py-2 text-zinc-700 hover:bg-sky-100 hover:shadow-md shadow-zinc-500 transition-all duration-300 ease-in-out">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" fill="currentColor" class="h-5 w-5 mr-1">
          <path d="M320 576C461.4 576 576 461.4 576 320C576 178.6 461.4 64 320 64C178.6 64 64 178.6 64 320C64 461.4 178.6 576 320 576zM288 224C288 206.3 302.3 192 320 192C337.7 192 352 206.3 352 224C352 241.7 337.7 256 320 256C302.3 256 288 241.7 288 224zM280 288L328 288C341.3 288 352 298.7 352 312L352 400L360 400C373.3 400 384 410.7 384 424C384 437.3 373.3 448 360 448L280 448C266.7 448 256 437.3 256 424C256 410.7 266.7 400 280 400L304 400L304 336L280 336C266.7 336 256 325.3 256 312C256 298.7 266.7 288 280 288z"/>
        </svg>
        About
      </a>

      <div class="relative" data-dropdown>
        <button type="button" data-dropdown-btn aria-expanded="false" aria-controls="servicesMenuDesktop" class="cursor-pointer rounded-xl px-3 py-2 text-zinc-700 hover:bg-sky-100 hover:shadow-md shadow-zinc-500 transition-all duration-300 ease-in-out inline-flex items-center gap-2">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" fill="currentColor" class="h-5 w-5">
            <path d="M104 112C90.7 112 80 122.7 80 136L80 184C80 197.3 90.7 208 104 208L152 208C165.3 208 176 197.3 176 184L176 136C176 122.7 165.3 112 152 112L104 112zM256 128C238.3 128 224 142.3 224 160C224 177.7 238.3 192 256 192L544 192C561.7 192 576 177.7 576 160C576 142.3 561.7 128 544 128L256 128zM256 288C238.3 288 224 302.3 224 320C224 337.7 238.3 352 256 352L544 352C561.7 352 576 337.7 576 320C576 302.3 561.7 288 544 288L256 288zM256 448C238.3 448 224 462.3 224 480C224 497.7 238.3 512 256 512L544 512C561.7 512 576 497.7 576 480C576 462.3 561.7 448 544 448L256 448zM80 296L80 344C80 357.3 90.7 368 104 368L152 368C165.3 368 176 357.3 176 344L176 296C176 282.7 165.3 272 152 272L104 272C90.7 272 80 282.7 80 296zM104 432C90.7 432 80 442.7 80 456L80 504C80 517.3 90.7 528 104 528L152 528C165.3 528 176 517.3 176 504L176 456C176 442.7 165.3 432 152 432L104 432z"/>
          </svg>
          Services
          <svg data-dropdown-icon viewBox="0 0 20 20" fill="currentColor" class="h-4 w-4 transition-transform">
            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z" clip-rule="evenodd" />
          </svg>
        </button>

        <div id="servicesMenuDesktop" data-dropdown-menu class="hidden absolute left-0 mt-2 w-50 rounded-xl bg-white/95 ring-1 ring-black/10 shadow-xl backdrop-blur p-1">
          <a href="<?php echo ROOT_URL; ?>/investigations" class="cursor-pointer block rounded-xl w-full pl-3 py-2 text-zinc-800 hover:bg-sky-100 hover:shadow-md shadow-zinc-500 transition-all duration-300 ease-in-out inline-flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" fill="currentColor" class="h-5 w-5 mr-1">
              <path d="M192 96L224 96C241.7 96 256 110.3 256 128L256 160L160 160L160 128C160 110.3 174.3 96 192 96zM256 192L256 512C256 529.7 241.7 544 224 544L96 544C78.3 544 64 529.7 64 512L64 452.9C64 418.3 73.4 384.3 91.2 354.6C104.9 331.8 113.7 306.4 117 280L124.5 220C126.5 204 140.1 192 156.3 192L256.1 192zM483.8 192C499.9 192 513.6 204 515.6 220L523 280C526.3 306.4 535.1 331.8 548.8 354.6C566.6 384.3 576 418.3 576 452.9L576 512C576 529.7 561.7 544 544 544L416 544C398.3 544 384 529.7 384 512L384 192L483.8 192zM384 128C384 110.3 398.3 96 416 96L448 96C465.7 96 480 110.3 480 128L480 160L384 160L384 128zM352 192L352 352L288 352L288 192L352 192z"/>
            </svg>
            Investigations
          </a>
          <a href="<?php echo ROOT_URL; ?>/guarding" class="cursor-pointer block rounded-xl w-full pl-3 py-2 text-zinc-800 hover:bg-sky-100 hover:shadow-md shadow-zinc-500 transition-all duration-300 ease-in-out inline-flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" fill="currentColor" class="h-5 w-5 mr-1">
              <path d="M333.4 66.9C329.2 65 324.7 64 320 64C315.3 64 310.8 65 306.6 66.9L118.3 146.8C96.3 156.1 79.9 177.8 80 204C80.5 303.2 121.3 484.7 293.6 567.2C310.3 575.2 329.7 575.2 346.4 567.2C518.8 484.7 559.6 303.2 560 204C560.1 177.8 543.7 156.1 521.7 146.8L333.4 66.9zM224.9 350.2C229.7 351.4 234.8 352 240 352C275.3 352 304 323.3 304 288L304 224L348.2 224C360.3 224 371.4 230.8 376.8 241.7L384 256L448 256C456.8 256 464 263.2 464 272L464 304C464 348.2 428.2 384 384 384L336 384L336 434.7C336 442 330.1 448 322.7 448C320.9 448 319.1 447.6 317.5 446.9L218.8 404.6C212.2 401.8 208 395.3 208 388.2C208 385.4 208.6 382.7 209.9 380.2L224.9 350.2zM224 224L272 224L272 288C272 305.7 257.7 320 240 320C222.3 320 208 305.7 208 288L208 240C208 231.2 215.2 224 224 224zM352 272C352 263.2 344.8 256 336 256C327.2 256 320 263.2 320 272C320 280.8 327.2 288 336 288C344.8 288 352 280.8 352 272z"/>
            </svg>
            Guarding
          </a>
        </div>
      </div>

      <a href="<?php echo ROOT_URL; ?>/insights" class="inline-flex items-center rounded-xl px-3 py-2 text-zinc-700 hover:bg-sky-100 hover:shadow-md shadow-zinc-500 transition-all duration-300 ease-in-out">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" fill="currentColor" class="h-5 w-5 mr-1">
          <path d="M64 480L64 184C64 170.7 74.7 160 88 160C101.3 160 112 170.7 112 184L112 472C112 485.3 122.7 496 136 496C149.3 496 160 485.3 160 472L160 160C160 124.7 188.7 96 224 96L512 96C547.3 96 576 124.7 576 160L576 480C576 515.3 547.3 544 512 544L128 544C92.7 544 64 515.3 64 480zM224 192L224 256C224 273.7 238.3 288 256 288L320 288C337.7 288 352 273.7 352 256L352 192C352 174.3 337.7 160 320 160L256 160C238.3 160 224 174.3 224 192zM248 432C234.7 432 224 442.7 224 456C224 469.3 234.7 480 248 480L488 480C501.3 480 512 469.3 512 456C512 442.7 501.3 432 488 432L248 432zM224 360C224 373.3 234.7 384 248 384L488 384C501.3 384 512 373.3 512 360C512 346.7 501.3 336 488 336L248 336C234.7 336 224 346.7 224 360zM424 240C410.7 240 400 250.7 400 264C400 277.3 410.7 288 424 288L488 288C501.3 288 512 277.3 512 264C512 250.7 501.3 240 488 240L424 240z"/>
        </svg>
        Insights
      </a>
      <a href="<?php echo ROOT_URL; ?>/contact" class="inline-flex items-center rounded-xl px-3 py-2 text-zinc-700 hover:bg-sky-100 hover:shadow-md shadow-zinc-500 transition-all duration-300 ease-in-out">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" fill="currentColor" class="h-5 w-5 mr-1">
          <path d="M224.2 89C216.3 70.1 195.7 60.1 176.1 65.4L170.6 66.9C106 84.5 50.8 147.1 66.9 223.3C104 398.3 241.7 536 416.7 573.1C493 589.3 555.5 534 573.1 469.4L574.6 463.9C580 444.2 569.9 423.6 551.1 415.8L453.8 375.3C437.3 368.4 418.2 373.2 406.8 387.1L368.2 434.3C297.9 399.4 241.3 341 208.8 269.3L253 233.3C266.9 222 271.6 202.9 264.8 186.3L224.2 89z"/>
        </svg>
        Contact
      </a>
    </nav>

    <div class="flex items-center gap-2 lg:w-[10rem] xl:w-[12rem]">
      <form action="../search.php" method="GET" class="hidden md:flex items-center w-full ml-auto">
        <label for="mq" class="sr-only">Search</label>

        <div class="relative flex-1">
          <input id="mq" name="q" type="search" placeholder="Search…" autocomplete="off" class="w-full ml-auto rounded-full bg-white ring-1 ring-black/10 px-8 py-1.5 text-base text-slate-900 placeholder:text-center placeholder:text-sm xl:placeholder:text-lg placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-sky-300"/>
          <svg class="pointer-events-none absolute left-3 top-1/2 h-3.5 w-3.5 -translate-y-1/2 text-slate-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="11" cy="11" r="7"></circle>
            <path d="M21 21l-4.35-4.35"></path>
          </svg>
        </div>
      </form>

      <button id="menuBtn" class="cursor-pointer inline-flex h-10 w-10 items-center justify-center rounded-xl bg-white ring-1 ring-black/10 hover:bg-sky-100 hover:shadow-md shadow-zinc-500 transition-all duration-300 ease-in-out lg:hidden">
        <span class="sr-only">Menu</span>
        <svg viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
          <path d="M4 7h16M4 12h16M4 17h16" />
        </svg>
      </button>
    </div>
  </div>
</header>

<div id="sidebarOverlay" class="fixed inset-0 z-[10000] bg-zinc-900/30 opacity-0 pointer-events-none backdrop-blur-sm transition-opacity duration-500"></div>

<aside id="sidebar" class="fixed top-0 left-0 z-[10001] h-full w-[17.5rem] -translate-x-full bg-white border-r border-black/10 p-6 transition-transform duration-500 ease-[cubic-bezier(0.32,0.72,0,1)]">
  <div class="flex items-center justify-between mb-10">
    <a href="<?php echo ROOT_URL; ?>/" class="flex items-center gap-3 hover:-translate-y-[0.1875rem] transition-all duration-500 ease-in-out">
      <div class="h-10 w-10 rounded-xl bg-white ring-1 ring-black/10 grid place-items-center">
        <img src="<?php echo url('assets/images/logo.webp'); ?>" alt="Corpsec Investigation" class="h-9 w-9">
      </div>
      <div class="leading-tight">
        <div class="text-xs font-semibold tracking-wide text-zinc-900">
          Corpsec Investigations<br> & Guarding Services
        </div>
        <div class="text-xs text-zinc-500 tracking-tighter">Observe. Protect. Expose.</div>
      </div>
    </a>

    <button id="closeBtn" class="cursor-pointer p-2 text-zinc-500 hover:text-orange-600 transition-colors" aria-label="Close menu">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
      </svg>
    </button>
  </div>

  <nav class="flex flex-col gap-3">
    <a data-sidebar-link href="<?php echo ROOT_URL; ?>/about" class="inline-flex items-center rounded-xl px-3 py-2 text-base text-zinc-700 hover:bg-sky-100 hover:shadow-md shadow-zinc-500 transition-all duration-300 ease-in-out">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" fill="currentColor" class="h-5 w-5 mr-1">
        <path d="M320 576C461.4 576 576 461.4 576 320C576 178.6 461.4 64 320 64C178.6 64 64 178.6 64 320C64 461.4 178.6 576 320 576zM288 224C288 206.3 302.3 192 320 192C337.7 192 352 206.3 352 224C352 241.7 337.7 256 320 256C302.3 256 288 241.7 288 224zM280 288L328 288C341.3 288 352 298.7 352 312L352 400L360 400C373.3 400 384 410.7 384 424C384 437.3 373.3 448 360 448L280 448C266.7 448 256 437.3 256 424C256 410.7 266.7 400 280 400L304 400L304 336L280 336C266.7 336 256 325.3 256 312C256 298.7 266.7 288 280 288z"/>
      </svg>
      About
    </a>

    <div class="rounded-2xl ring-1 ring-black/10 bg-white" data-dropdown>
      <button type="button" data-dropdown-btn aria-expanded="false" aria-controls="servicesMenuMobile" class="cursor-pointer w-full flex items-center justify-between px-3 py-3 text-base text-zinc-800 hover:text-zinc-900 transition-all duration-700 ease-in-out">
        <span class="flex items-center">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" fill="currentColor" class="h-5 w-5 mr-1">
            <path d="M104 112C90.7 112 80 122.7 80 136L80 184C80 197.3 90.7 208 104 208L152 208C165.3 208 176 197.3 176 184L176 136C176 122.7 165.3 112 152 112L104 112zM256 128C238.3 128 224 142.3 224 160C224 177.7 238.3 192 256 192L544 192C561.7 192 576 177.7 576 160C576 142.3 561.7 128 544 128L256 128zM256 288C238.3 288 224 302.3 224 320C224 337.7 238.3 352 256 352L544 352C561.7 352 576 337.7 576 320C576 302.3 561.7 288 544 288L256 288zM256 448C238.3 448 224 462.3 224 480C224 497.7 238.3 512 256 512L544 512C561.7 512 576 497.7 576 480C576 462.3 561.7 448 544 448L256 448zM80 296L80 344C80 357.3 90.7 368 104 368L152 368C165.3 368 176 357.3 176 344L176 296C176 282.7 165.3 272 152 272L104 272C90.7 272 80 282.7 80 296zM104 432C90.7 432 80 442.7 80 456L80 504C80 517.3 90.7 528 104 528L152 528C165.3 528 176 517.3 176 504L176 456C176 442.7 165.3 432 152 432L104 432z"/>
          </svg>
          <span>Services</span>
        </span>
        <svg data-dropdown-icon viewBox="0 0 20 20" fill="currentColor" class="h-4 w-4 transition-transform">
          <path fill-rule="evenodd"
            d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z"
            clip-rule="evenodd" />
        </svg>
      </button>

      <div id="servicesMenuMobile" data-dropdown-menu class="hidden px-2 pb-2">
        <a data-sidebar-link href="<?php echo ROOT_URL; ?>/investigations" class="flex items-center block rounded-xl px-3 py-2 text-sm text-zinc-700 hover:text-zinc-900 hover:bg-sky-100 hover:shadow-md shadow-zinc-500 transition-all duration-300 ease-in-out">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" fill="currentColor" class="h-5 w-5 mr-1">
            <path d="M192 96L224 96C241.7 96 256 110.3 256 128L256 160L160 160L160 128C160 110.3 174.3 96 192 96zM256 192L256 512C256 529.7 241.7 544 224 544L96 544C78.3 544 64 529.7 64 512L64 452.9C64 418.3 73.4 384.3 91.2 354.6C104.9 331.8 113.7 306.4 117 280L124.5 220C126.5 204 140.1 192 156.3 192L256.1 192zM483.8 192C499.9 192 513.6 204 515.6 220L523 280C526.3 306.4 535.1 331.8 548.8 354.6C566.6 384.3 576 418.3 576 452.9L576 512C576 529.7 561.7 544 544 544L416 544C398.3 544 384 529.7 384 512L384 192L483.8 192zM384 128C384 110.3 398.3 96 416 96L448 96C465.7 96 480 110.3 480 128L480 160L384 160L384 128zM352 192L352 352L288 352L288 192L352 192z"/>
          </svg>
          Investigations
        </a>
        <a data-sidebar-link href="<?php echo ROOT_URL; ?>/guarding" class="flex items-center block rounded-xl px-3 py-2 text-sm text-zinc-700 hover:text-zinc-900 hover:bg-sky-100 hover:shadow-md shadow-zinc-500 transition-all duration-300 ease-in-out">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" fill="currentColor" class="h-5 w-5 mr-1">
            <path d="M333.4 66.9C329.2 65 324.7 64 320 64C315.3 64 310.8 65 306.6 66.9L118.3 146.8C96.3 156.1 79.9 177.8 80 204C80.5 303.2 121.3 484.7 293.6 567.2C310.3 575.2 329.7 575.2 346.4 567.2C518.8 484.7 559.6 303.2 560 204C560.1 177.8 543.7 156.1 521.7 146.8L333.4 66.9zM224.9 350.2C229.7 351.4 234.8 352 240 352C275.3 352 304 323.3 304 288L304 224L348.2 224C360.3 224 371.4 230.8 376.8 241.7L384 256L448 256C456.8 256 464 263.2 464 272L464 304C464 348.2 428.2 384 384 384L336 384L336 434.7C336 442 330.1 448 322.7 448C320.9 448 319.1 447.6 317.5 446.9L218.8 404.6C212.2 401.8 208 395.3 208 388.2C208 385.4 208.6 382.7 209.9 380.2L224.9 350.2zM224 224L272 224L272 288C272 305.7 257.7 320 240 320C222.3 320 208 305.7 208 288L208 240C208 231.2 215.2 224 224 224zM352 272C352 263.2 344.8 256 336 256C327.2 256 320 263.2 320 272C320 280.8 327.2 288 336 288C344.8 288 352 280.8 352 272z"/>
          </svg>
          Guarding
        </a>
      </div>
    </div>

    <a data-sidebar-link href="<?php echo ROOT_URL; ?>/insights" class="inline-flex items-center rounded-xl px-3 py-2 text-base text-zinc-700 hover:text-zinc-900 hover:bg-sky-100 hover:shadow-md shadow-zinc-500 transition-all duration-300 ease-in-out">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" fill="currentColor" class="h-5 w-5 mr-1">
        <path d="M64 480L64 184C64 170.7 74.7 160 88 160C101.3 160 112 170.7 112 184L112 472C112 485.3 122.7 496 136 496C149.3 496 160 485.3 160 472L160 160C160 124.7 188.7 96 224 96L512 96C547.3 96 576 124.7 576 160L576 480C576 515.3 547.3 544 512 544L128 544C92.7 544 64 515.3 64 480zM224 192L224 256C224 273.7 238.3 288 256 288L320 288C337.7 288 352 273.7 352 256L352 192C352 174.3 337.7 160 320 160L256 160C238.3 160 224 174.3 224 192zM248 432C234.7 432 224 442.7 224 456C224 469.3 234.7 480 248 480L488 480C501.3 480 512 469.3 512 456C512 442.7 501.3 432 488 432L248 432zM224 360C224 373.3 234.7 384 248 384L488 384C501.3 384 512 373.3 512 360C512 346.7 501.3 336 488 336L248 336C234.7 336 224 346.7 224 360zM424 240C410.7 240 400 250.7 400 264C400 277.3 410.7 288 424 288L488 288C501.3 288 512 277.3 512 264C512 250.7 501.3 240 488 240L424 240z"/>
      </svg>
      Insights
    </a>

    <a data-sidebar-link href="<?php echo ROOT_URL; ?>/contact" class="inline-flex items-center rounded-xl px-3 py-2 text-base text-zinc-700 hover:text-zinc-900 hover:bg-sky-100 hover:shadow-md shadow-zinc-500 transition-all duration-300 ease-in-out">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" fill="currentColor" class="h-5 w-5 mr-1">
        <path d="M224.2 89C216.3 70.1 195.7 60.1 176.1 65.4L170.6 66.9C106 84.5 50.8 147.1 66.9 223.3C104 398.3 241.7 536 416.7 573.1C493 589.3 555.5 534 573.1 469.4L574.6 463.9C580 444.2 569.9 423.6 551.1 415.8L453.8 375.3C437.3 368.4 418.2 373.2 406.8 387.1L368.2 434.3C297.9 399.4 241.3 341 208.8 269.3L253 233.3C266.9 222 271.6 202.9 264.8 186.3L224.2 89z"/>
      </svg>
      Contact
    </a>

    <hr class="border-black/10 my-4">

    <form action="../search.php" method="GET" class="flex items-center gap-2">
      <label for="mq" class="sr-only">Search</label>

      <div class="relative flex-1">
        <input id="mq" name="q" type="search" placeholder="Search…" autocomplete="off" class="w-[85%] mx-auto rounded-full bg-white ring-1 ring-black/10 px-10 py-1.5 text-base text-slate-900 placeholder:text-center placeholder:text-sm placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-sky-300"/>
        <svg class="pointer-events-none absolute left-4 xl:left-[2rem] top-1/2 h-3.5 w-3.5 -translate-y-1/2 text-slate-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <circle cx="11" cy="11" r="7"></circle>
          <path d="M21 21l-4.35-4.35"></path>
        </svg>
      </div>
    </form>
  </nav>
</aside>
