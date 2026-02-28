const $ = (q, el = document) => el.querySelector(q)
const $$ = (q, el = document) => Array.from(el.querySelectorAll(q))

const mobileOpen = $('[data-mobile-open]')
const mobilePanel = $('[data-mobile-panel]')
if (mobileOpen && mobilePanel) {
  mobileOpen.addEventListener('click', () => {
    mobilePanel.classList.toggle('hidden')
  })
  $$('a', mobilePanel).forEach(a => a.addEventListener('click', () => mobilePanel.classList.add('hidden')))
}

const modal = $('[data-request-modal]')
const overlay = $('[data-request-overlay]')
const openers = $$('[data-open-request]')
const closeBtn = $('[data-request-close]')

const modalOpen = () => {
  if (!modal) return
  modal.classList.remove('hidden')
  document.documentElement.classList.add('overflow-hidden')
}

const modalClose = () => {
  if (!modal) return
  modal.classList.add('hidden')
  document.documentElement.classList.remove('overflow-hidden')
}

openers.forEach(b => b.addEventListener('click', modalOpen))
if (closeBtn) closeBtn.addEventListener('click', modalClose)
if (overlay) overlay.addEventListener('click', modalClose)

document.addEventListener('keydown', (e) => {
  if (e.key === 'Escape') modalClose()
})

const revealEls = $$('[data-reveal]')
revealEls.forEach(el => {
  el.classList.add('opacity-0', 'translate-y-6', 'transition', 'duration-700', 'ease-out')
})

if (revealEls.length) {
  const io = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (!entry.isIntersecting) return
      entry.target.classList.remove('opacity-0', 'translate-y-6')
      entry.target.classList.add('opacity-100', 'translate-y-0')
      io.unobserve(entry.target)
    })
  }, { threshold: 0.18 })

  revealEls.forEach(el => io.observe(el))
}

const parallaxEls = $$('[data-parallax]')
let parallaxTick = false
const parallax = () => {
  const y = window.scrollY || 0
  parallaxEls.forEach(el => {
    const speed = parseFloat(el.dataset.speed || '0.12')
    const base = parseFloat(el.dataset.base || '0')
    const offset = y * speed
    el.style.transform = `translate3d(0, ${offset * 0.2 + base}px, 0)`
  })
  parallaxTick = false
}

if (parallaxEls.length) {
  window.addEventListener('scroll', () => {
    if (parallaxTick) return
    parallaxTick = true
    requestAnimationFrame(parallax)
  }, { passive: true })
  parallax()
}

const wizard = $('[data-wizard]')
if (wizard) {
  const steps = $$('[data-wizard-step]', wizard)
  const btnNext = $('[data-wizard-next]', wizard)
  const btnBacks = $$('[data-wizard-back]', wizard)
  const progress = $('[data-progress]')
  const stepLabel = $('[data-step-label]')
  const nav = $('[data-wizard-nav]', wizard)
  let idx = 0

  const requiredFields = (stepEl) => $$('input,select,textarea', stepEl).filter(el => el.hasAttribute('required'))
  const isValidEmail = (v) => /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v)

  const radioGroupChecked = (stepEl, name) => $$(`input[type="radio"][name="${name}"]`, stepEl).some(r => r.checked)

  const findFirstInvalid = (stepEl) => {
    const req = requiredFields(stepEl)
    const seenRadio = new Set()
    for (const el of req) {
      if (el.type === 'radio') {
        if (seenRadio.has(el.name)) continue
        seenRadio.add(el.name)
        if (!radioGroupChecked(stepEl, el.name)) return el
        continue
      }
      if (el.type === 'checkbox') {
        if (!el.checked) return el
        continue
      }
      if (!el.value) return el
      if (el.type === 'email' && el.value && !isValidEmail(el.value)) return el
    }
    return null
  }

  const stepValid = () => {
    const stepEl = steps[idx]
    const req = requiredFields(stepEl)
    let ok = true
    const seenRadio = new Set()

    req.forEach(el => {
      if (el.type === 'radio') {
        if (seenRadio.has(el.name)) return
        seenRadio.add(el.name)
        if (!radioGroupChecked(stepEl, el.name)) ok = false
        return
      }
      if (el.type === 'checkbox') {
        if (!el.checked) ok = false
        return
      }
      if (!el.value) ok = false
      if (el.type === 'email' && el.value && !isValidEmail(el.value)) ok = false
    })

    return ok
  }

  const show = (i) => {
    idx = Math.max(0, Math.min(steps.length - 1, i))
    steps.forEach((s, n) => s.classList.toggle('hidden', n !== idx))
    const pct = ((idx + 1) / steps.length) * 100
    if (progress) progress.style.width = pct + '%'
    if (stepLabel) stepLabel.textContent = `Step ${idx + 1} of ${steps.length}`
    if (nav) nav.classList.toggle('hidden', idx === steps.length - 1)
    btnBacks.forEach(b => b.classList.toggle('invisible', idx === 0))
  }

  if (btnNext) {
    btnNext.addEventListener('click', () => {
      if (!stepValid()) {
        const stepEl = steps[idx]
        const first = findFirstInvalid(stepEl)
        if (first) first.focus()
        return
      }
      show(idx + 1)
    })
  }

  btnBacks.forEach(b => b.addEventListener('click', () => show(idx - 1)))
  show(0)

  wizard.addEventListener('submit', () => {
    const submitButtons = $$('button[type="submit"]', wizard)
    submitButtons.forEach(b => {
      b.disabled = true
      b.classList.add('opacity-70', 'cursor-not-allowed')
    })
  })
}

$$('[data-tabs]').forEach(root => {
  const buttons = $$('[data-tab]', root)
  const panels = $$('[data-panel]', root)
  if (!buttons.length || !panels.length) return

  const activate = (key) => {
    buttons.forEach(b => {
      const isOn = b.dataset.tab === key
      b.classList.toggle('bg-white', isOn)
      b.classList.toggle('shadow-sm', isOn)
      b.classList.toggle('text-zinc-900', isOn)
      b.classList.toggle('text-zinc-600', !isOn)
      if (!isOn) b.classList.remove('bg-white', 'shadow-sm', 'text-zinc-900')
    })
    panels.forEach(p => p.classList.toggle('hidden', p.dataset.panel !== key))
  }

  const initial = buttons[0].dataset.tab
  activate(initial)
  buttons.forEach(b => b.addEventListener('click', () => activate(b.dataset.tab)))
})

const countEls = $$('[data-count-to]')
if (countEls.length) {
  const animateCount = (el) => {
    const target = parseInt(el.dataset.countTo || '0', 10)
    if (!isFinite(target) || target <= 0) return
    const start = 0
    const duration = 900
    const t0 = performance.now()
    const step = (t) => {
      const p = Math.min(1, (t - t0) / duration)
      const v = Math.round(start + (target - start) * (1 - Math.pow(1 - p, 3)))
      el.textContent = String(v)
      if (p < 1) requestAnimationFrame(step)
    }
    requestAnimationFrame(step)
  }

  const io = new IntersectionObserver(entries => {
    entries.forEach(e => {
      if (!e.isIntersecting) return
      animateCount(e.target)
      io.unobserve(e.target)
    })
  }, { threshold: 0.4 })

  countEls.forEach(el => io.observe(el))
}

$$('[data-carousel]').forEach(root => {
  const track = $('[data-carousel-track]', root)
  const prev = $('[data-carousel-prev]', root)
  const next = $('[data-carousel-next]', root)
  const dotsWrap = $('[data-carousel-dots]', root)
  if (!track) return
  const slides = Array.from(track.children)
  if (!slides.length) return
  let idx = 0

  const dots = dotsWrap ? $$('[data-carousel-dot]', dotsWrap) : []

  const render = () => {
    track.style.transform = `translate3d(${-idx * 100}%, 0, 0)`
    dots.forEach(d => {
      const on = parseInt(d.dataset.carouselDot || '0', 10) === idx
      d.classList.toggle('bg-sky-500', on)
      d.classList.toggle('bg-sky-200', !on)
      d.classList.toggle('ring-2', on)
      d.classList.toggle('ring-sky-200/60', on)
    })
  }

  const go = (i) => {
    idx = (i + slides.length) % slides.length
    render()
  }

  if (prev) prev.addEventListener('click', () => go(idx - 1))
  if (next) next.addEventListener('click', () => go(idx + 1))
  dots.forEach(d => d.addEventListener('click', () => go(parseInt(d.dataset.carouselDot || '0', 10))))
  render()

  let timer = null
  const start = () => {
    stop()
    timer = setInterval(() => go(idx + 1), 7000)
  }
  const stop = () => {
    if (timer) clearInterval(timer)
    timer = null
  }

  root.addEventListener('mouseenter', stop)
  root.addEventListener('mouseleave', start)
  start()
})

const radarEls = $$('[data-radar]')
if (radarEls.length) {
  let last = performance.now()
  const tick = (t) => {
    const dt = t - last
    last = t
    radarEls.forEach(el => {
      const cur = parseFloat(el.dataset.rot || '0')
      const next = cur + dt * 0.03
      el.dataset.rot = String(next)
      el.style.transform = `rotate(${next}deg)`
    })
    requestAnimationFrame(tick)
  }
  requestAnimationFrame(tick)
}

$$('[data-rich]').forEach(root => {
  const set = (sel, cls) => $$(sel, root).forEach(el => el.classList.add(...cls.split(' ')))
  root.classList.add('text-zinc-700')
  
  set('h1', `font-['Sora',ui-sans-serif,system-ui] text-3xl md:text-4xl font-semibold tracking-tight text-zinc-900 mt-2`)
  set('h2', `font-['Sora',ui-sans-serif,system-ui] text-2xl md:text-3xl font-semibold tracking-tight text-zinc-900 mt-8`)
  set('h3', `font-['Sora',ui-sans-serif,system-ui] text-xl md:text-2xl font-semibold tracking-tight text-zinc-900 mt-6`)
  
  set('p', 'mt-4 text-sm md:text-base leading-relaxed')
  set('ul', 'mt-4 list-disc pl-6 space-y-2')
  set('ol', 'mt-4 list-decimal pl-6 space-y-2')
  set('li', 'text-sm md:text-base leading-relaxed')
  set('a', 'text-sky-700 font-semibold underline decoration-sky-200 underline-offset-4 hover:text-indigo-700')
  set('blockquote', 'mt-6 rounded-3xl bg-sky-50 p-6 ring-1 ring-sky-200/60 text-zinc-700')
  set('strong', 'text-zinc-900 font-semibold')
})
