window.Drivolution ?= {
  Events: {},
}

class Drivolution.Site
  current_page: null
  $el: null

  constructor: (@$el) ->
    @route @$el.data('page')

    @init_events()
    @init_shared()

  init_events: ->
    $(document).on 'goto', @goto

  goto: (e, page) ->
    document.location = window.base_url + page

  route: (page) ->
    switch page
      when ''
        @current_page = new Drivolution.Index()
      else
        @current_page = new Drivolution.Base()

  init_shared: ->

$(document).ready ->
  window.site.app = new Drivolution.Site $('body')

  # tracking
  $(document).on "click", "a[href]", (e) ->
    href = $(this).prop "href"
    to_frame = $(this).prop("target") == '_blank'
    root = window.location.protocol + "//" + window.location.host

    if href.slice(0, root.length) != root
      e.preventDefault() unless to_frame

      ga(
        'send',
        'event',
        'outbound',
        'click',
        href,
        {
          'hitCallback': () =>
            unless to_frame
              document.location = href
        }
      )

      false unless to_frame
