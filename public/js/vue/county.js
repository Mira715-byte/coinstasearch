const client = algoliasearch('91OMIUBDPO', 'ef1d5de66b105cc1f42f081f476799e2');
const $algoliasearchHelper = algoliasearchHelper(client, 'companies', {
  disjunctiveFacets: ['county'],
  hitsPerPage: 12,
  maxValuesPerFacet: 20
});

const SearchBox = Vue.extend({
  template: `
    <div class="form">
      <input
        type="text"
        class="search-box"
        placeholder="Căutați compania dorită..."
        v-model="query"
      />
    </div>
  `,
  data() {
    return {query: ''};
  },

  ready() {
    this.$watch('query', query => {
      $algoliasearchHelper.setQuery(query).search();
    });

    $algoliasearchHelper.search();
  }
});

const RefinementList = Vue.extend({
  template: `
      <div class="counties">
        <div v-for="facet in facets" v-bind:class="{active: facet.isRefined}">
          <label v-on:click.prevent="toggleFacet(facet.name, $evt)">
           
            {{{facet.name}}}
            <span class="badge">{{facet.count}}</span>
          </label>
        </div>
      </div>
  `,
  data() {
    return {
      facets: []
    };
  },

  ready() {
    $algoliasearchHelper.on('result', results => {
      this.facets = results.getFacetValues('county', ['selected', 'count:desc']).slice(0, 5);
    });
  },

  methods: {
    toggleFacet(facetName) {
      $algoliasearchHelper.toggleRefinement('county', facetName).search();
    }
  }
});

const Results = Vue.extend({
  template: `
      <div class="results">
        <div v-for="hit in hits" class="list-group-item">
         <button class="accordion"><b>Numele companiei:</b> {{{hit._highlightResult.company_name.value}}}</button>
           <button class="accordion"><b>Adresă:</b> {{{hit._highlightResult.address.value}}}</button>
          <button class="accordion"><b>Oraș:</b> {{{hit._highlightResult.city.value}}}, <b>Județ:</b> {{{hit._highlightResult.county .value}}}</button>
        </div>
      </ul>
  `,
  data() {
    return {
      hits: []
    };
  },

  ready() {
    this.$resultsListener = $algoliasearchHelper.on('result', results => {
      this.hits = results.hits;
    });
  }
});

const Pager = Vue.extend({
  template: `
    <div class='pager'>
    <button class='previous' v-on:click="prevPage">Previous</button>
    <span class='current-page'>{{currentPage + 1}}</span>
    <button class='next' v-on:click="nextPage">Next</button>
  </div>
  `,

  data() {
    return {
      currentPage: 0
    }
  },

  ready() {
    $algoliasearchHelper.on('change', (state) => {
      this.currentPage = $algoliasearchHelper.getPage();
    })
  },

  methods: {
    prevPage() {
      if (this.currentPage > 0) {
        $algoliasearchHelper.previousPage().search();
      }
    },

    nextPage() {
      $algoliasearchHelper.nextPage().search();
    }
  }

})

const App = Vue.extend({
  template: `
    <div id="app" class="app">
      <search-box></search-box>
      <refinement-list></refinement-list>
      <results></results>
      <pager></pager>
    </div>
  `,
  components: {
    SearchBox,
    Results,
    RefinementList,
    Pager
  }
});

new Vue({
  el: 'body',
  components: {
    App
  }
})