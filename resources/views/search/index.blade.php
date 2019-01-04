@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="left-column">
                    <div id="category-refinement"></div>
                    <div id="company-refinement"></div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="input-group" style="margin-bottom: 10px;">
                    <input id="search-input"
                           placeholder="Search for products"
                           class="form-control"
                           style="padding-left: 24px;"
                    >
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
        <div class="hit card">
            <div class="card-body">
                <div class="media">
                    @{{#logo_url}}
                        <img src="@{{logo_url}}" class="hit-image align-self-start mr-3" alt="@{{name}}">
                    @{{/logo_url}}
                    @{{^logo_url}}
                        <img src="https://placeimg.com/160/120/tech/sepia?@{{name}}" class="hit-image align-self-start mr-3" alt="@{{name}}">
                    @{{/logo_url}}
                    <div class="media-body hit-content">
                        <a href="/detail/@{{slug}}">
                            <h5 class="mt-0">@{{{_highlightResult.name.value}}}</h5>
                        </a>
                        <h6 class="mt-0 mb-0">by @{{{_highlightResult.company.name.value}}}</h6>
                        <div class="row">
                            <div class="col">
                                <div class="star-ratings-sprite">
                                    <span style="width:@{{average_rating}}%" class="star-ratings-sprite-rating"></span>
                                </div>
                                <span class="total-comment-count">(@{{total_comment_count}})</span>
                            </div>
                        </div>

                        <p class="hit-description ">@{{{_highlightResult.description.value}}}</p>
                    </div>
                </div>

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
                },
                cssClasses:{
                    root: 'card',
                    header: 'card-body',
                    body: 'card-body'
                }
            })
        );

        search.addWidget(
            instantsearch.widgets.refinementList({
                container: '#category-refinement',
                attributeName: 'categories.name',
                templates: {
                    header: 'Category'
                },
                cssClasses:{
                    root: 'card',
                    header: 'card-body',
                    body: 'card-body'
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
                container: '#pagination',
                cssClasses:{
                    root: 'pagination',
                    item: 'page-item',
                    link: 'page-link',
                    page: '',
                    previous: 'page-item',
                    next: 'page-item',
                    first: 'page-item',
                    last: 'page-item',
                    active: 'active',
                    disabled: 'disabled'
                }
            })
        );

        // Add this after all the search.addWidget() calls
        search.start();

    </script>


@endpush
