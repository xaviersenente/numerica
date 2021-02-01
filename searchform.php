<div class="searchForm bg-white">
  <div class="container-fluid h-100">
    <button class="searchForm__close" aria-label="Fermer le formulaire de recherche">
      <svg viewBox="0 0 24 24">
        <title>cross</title>
        <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/> 
      </svg>
    </button>
    <form class="searchForm__form h-100" action="<?php echo esc_url( site_url() ); ?>" method="get">
      <label for="searchForm" class="sr-only">Rechercher</label>
      <input id="searchForm" class="searchForm__input h-100 w-100" type="search" name="s" placeholder="Rechercher…" value="<?php the_search_query(); ?>" />
      <button class="searchForm__submit" type="submit" aria-label="Rechercher">
        <svg width="24" height="24" aria-hidden="true" fill="none" xmlns="http://www.w3.org/2000/svg">
          <circle cx="11" cy="10" r="7" stroke="#191919" stroke-width="2" />
          <path stroke="#191919" stroke-width="2" d="M17.707 17.293l3.536 3.535" />
        </svg>
      </button>
    </form>
  </div>
</div>
