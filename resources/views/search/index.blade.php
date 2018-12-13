@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-2">
                <div class="left-column">
                    <div id="company-refinement"></div>
                    <div id="category-refinement"></div>
                </div>
            </div>
            <div class="col-md-8">
                <div>
                    <input id="search-input" placeholder="Search for products">
                    <!-- We use a specific placeholder in the input to guides users in their search. -->
                </div>
                <div id="hits"></div>
                <div id="pagination"></div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- Add this to your HTML document -->
    <script type="text/html" id="hit-template">
        <div class="hit">
            <div class="hit-image">
                <img src="@{{logo_url}}" alt="@{{name}}">
            </div>
            <div class="hit-content">
                <h3 class="hit-price">$@{{id}}</h3>
                <h2 class="hit-name">@{{{_highlightResult.name.value}}}</h2>
                <p class="hit-description">@{{{_highlightResult.description.value}}}</p>
            </div>
        </div>
    </script>
    <script>
        var search = instantsearch({
            // Replace with your own values
            appId: 'F3DTFBXAC7',
            apiKey: 'd9da8aec0bcdf388217db0d46039ee0d', // search only API key, no ADMIN key
            indexName: 'libraryappcenter',
            urlSync: true,
            searchParameters: {
                hitsPerPage: 20
            }
        });

        // Add this after the previous JavaScript code
        search.addWidget(
            instantsearch.widgets.searchBox({
                container: '#search-input'
            })
        );

        // Add this after the previous JavaScript code
        search.addWidget(
            instantsearch.widgets.hits({
                container: '#hits',
                templates: {
                    item: document.getElementById('hit-template').innerHTML,
                    empty: "We didn't find any results for the search <em>\"@{{query}}\"</em>"
                }
            })
        );

        search.addWidget(
            instantsearch.widgets.refinementList({
                container: '#company-refinement',
                attributeName: 'company.name',
                templates: {
                    header: 'Company'
                }
            })
        );

        search.addWidget(
            instantsearch.widgets.refinementList({
                container: '#category-refinement',
                attributeName: 'categories.name',
                templates: {
                    header: 'Category'
                }
            })
        );

        /*search.addWidget(
            instantsearch.widgets.refinementList({
                container: '#company-refinement',
                attributeName: 'company.name',
                templates: {
                    header: 'Company'
                },
                searchForFacetValues: {
                    placeholder: 'Search for Company',
                    templates: {
                        noResults: '<div class="sffv_no-results">No matching companies.</div>'
                    }
                }
            })
        );*/

        // Add this after the other search.addWidget() calls
        search.addWidget(
            instantsearch.widgets.pagination({
                container: '#pagination'
            })
        );

        // Add this after all the search.addWidget() calls
        search.start();

    </script>


@endpush
