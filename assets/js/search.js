(function () {
  const q = document.getElementById("q");
  const clearBtn = document.getElementById("clearSearch");

  const openSearch = document.getElementById("openSearch");
  const wrap = document.getElementById("mobileSearchWrap");
  const backdrop = document.getElementById("mobileSearchBackdrop");
  const closeBtn = document.getElementById("closeMobileSearch");
  const mq = document.getElementById("mq");

  function toggleClear() {
    if (!q || !clearBtn) return;
    clearBtn.classList.toggle("hidden", !q.value.trim());
  }

  if (q) {
    q.addEventListener("input", toggleClear);
    toggleClear();
  }

  if (clearBtn) {
    clearBtn.addEventListener("click", () => {
      q.value = "";
      q.focus();
      toggleClear();
    });
  }

  function openMobile() {
    if (!wrap) return;
    wrap.classList.remove("hidden");
    setTimeout(() => mq && mq.focus(), 0);
    document.documentElement.classList.add("overflow-hidden");
  }

  function closeMobile() {
    if (!wrap) return;
    wrap.classList.add("hidden");
    document.documentElement.classList.remove("overflow-hidden");
  }

  if (openSearch) openSearch.addEventListener("click", openMobile);
  if (backdrop) backdrop.addEventListener("click", closeMobile);
  if (closeBtn) closeBtn.addEventListener("click", closeMobile);

  window.addEventListener("keydown", (e) => {
    if (e.key === "Escape" && wrap && !wrap.classList.contains("hidden")) closeMobile();
  });
})();
