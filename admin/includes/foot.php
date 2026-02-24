</div>
    </div>
  </div>

  <script>
    const btn = document.querySelector('[data-admin-menu]')
    const drawer = document.querySelector('[data-admin-drawer]')
    const overlay = document.querySelector('[data-admin-overlay]')
    if (btn && drawer) {
      const open = () => drawer.classList.remove('hidden')
      const close = () => drawer.classList.add('hidden')
      btn.addEventListener('click', open)
      if (overlay) overlay.addEventListener('click', close)
      document.addEventListener('keydown', (e) => { if (e.key === 'Escape') close() })
    }
  </script>
  <script src="<?php echo url('assets/js/app.js'); ?>"></script>
</body>
</html>
