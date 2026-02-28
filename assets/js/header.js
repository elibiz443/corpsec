document.addEventListener('DOMContentLoaded', () => {
  const qs = (s, el = document) => el.querySelector(s)
  const qsa = (s, el = document) => Array.from(el.querySelectorAll(s))

  const mainHeader = qs('#mainHeader')
  const headerContainer = qs('#headerContainer')

  const menuBtn = qs('#menuBtn')
  const closeBtn = qs('#closeBtn')
  const sidebar = qs('#sidebar')
  const overlay = qs('#sidebarOverlay')

  const dropdowns = qsa('[data-dropdown]')

  const isSidebarOpen = () => sidebar && !sidebar.classList.contains('-translate-x-full')

  const setSidebarOpen = (open) => {
    if (!sidebar || !overlay) return

    if (open) {
      sidebar.classList.remove('-translate-x-full')
      overlay.classList.remove('opacity-0', 'pointer-events-none')
      document.body.style.overflow = 'hidden'
    } else {
      sidebar.classList.add('-translate-x-full')
      overlay.classList.add('opacity-0', 'pointer-events-none')
      document.body.style.overflow = ''
    }
  }

  const setDropdownOpen = (dd, open) => {
    const btn = qs('[data-dropdown-btn]', dd)
    const menu = qs('[data-dropdown-menu]', dd)
    const icon = qs('[data-dropdown-icon]', dd)
    if (!btn || !menu) return

    btn.setAttribute('aria-expanded', open ? 'true' : 'false')
    menu.classList.toggle('hidden', !open)
    if (icon) icon.classList.toggle('rotate-180', open)
  }

  const closeAllDropdowns = (except = null) => {
    dropdowns.forEach((dd) => {
      if (dd === except) return
      setDropdownOpen(dd, false)
    })
  }

  const onScroll = () => {
    if (!mainHeader || !headerContainer) return

    if (window.scrollY > 60) {
      if (headerContainer.classList.contains('py-5')) headerContainer.classList.replace('py-5', 'py-2')
      else headerContainer.classList.add('py-2')
      headerContainer.classList.remove('py-5')
      mainHeader.classList.add('shadow-xl', 'bg-white/90')
    } else {
      if (headerContainer.classList.contains('py-2')) headerContainer.classList.replace('py-2', 'py-5')
      else headerContainer.classList.add('py-5')
      headerContainer.classList.remove('py-2')
      mainHeader.classList.remove('shadow-xl', 'bg-white/90')
    }
  }

  const onResize = () => {
    if (!menuBtn) return
    const menuHidden = window.getComputedStyle(menuBtn).display === 'none'
    if (menuHidden && isSidebarOpen()) setSidebarOpen(false)
  }

  window.addEventListener('scroll', onScroll, { passive: true })
  window.addEventListener('resize', onResize, { passive: true })
  onScroll()
  onResize()

  if (menuBtn) menuBtn.addEventListener('click', () => setSidebarOpen(true))
  if (closeBtn) closeBtn.addEventListener('click', () => setSidebarOpen(false))
  if (overlay) overlay.addEventListener('click', () => setSidebarOpen(false))

  qsa('[data-sidebar-link]').forEach((a) => {
    a.addEventListener('click', () => setSidebarOpen(false))
  })

  dropdowns.forEach((dd) => {
    const btn = qs('[data-dropdown-btn]', dd)
    const menu = qs('[data-dropdown-menu]', dd)
    if (!btn || !menu) return

    setDropdownOpen(dd, false)

    btn.addEventListener('click', (e) => {
      e.preventDefault()
      const isOpen = btn.getAttribute('aria-expanded') === 'true'
      closeAllDropdowns(dd)
      setDropdownOpen(dd, !isOpen)
    })

    qsa('a', menu).forEach((a) => {
      a.addEventListener('click', () => closeAllDropdowns())
    })
  })

  document.addEventListener('click', (e) => {
    const clickedInsideAnyDropdown = dropdowns.some((dd) => dd.contains(e.target))
    if (!clickedInsideAnyDropdown) closeAllDropdowns()
  })

  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
      setSidebarOpen(false)
      closeAllDropdowns()
    }
  })
})
