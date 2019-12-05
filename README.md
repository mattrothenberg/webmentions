# Webmentions

> A custom tag for Statamic v3

## What is this?

As per https://webmention.io/,

> webmention.io is an open-source project and hosted service for receiving webmentions and pingbacks on behalf of your indieweb site.

Which is a fancy way of saying after signing up for this service, you can easily add the following snippets to your website in order to collect mentions/pingbacks (be sure to replace `<username>` with your, well, username 😅.

```
<link rel="webmention" href="https://webmention.io/<username>/webmention" />
<link rel="pingback" href="https://webmention.io/<username>/xmlrpc" />
```

Assuming you've done so, this plugin gives to you a `{{ webmentions }}` tag that you can use in your Statamic site to display those collected mentions and pingbacks!

## Installation

```
composer require mattrothenberg/webmentions
```

## Demo 🚀

The sky's the limit when it comes to how you present your Webmention data! Here's a demo of the [example Vue component found in this repo!](mention-list.vue). Beware the component assumes you have [Tailwind](https://tailwindcss.com/) and [`v-tooltip`](https://github.com/Akryum/v-tooltip) installed.

<img alt="Demo" src="https://i.imgur.com/yKVuVsj.gif" width="600" />

## Usage (Antlers)

This addon exposes a new tag called `webmentions`. Use it as follows, making sure to pass a `url` parameter.

```html
{{webmentions url="https://mattrothenberg.com/"}}
  {{ if no_results }}
    <p>No results.</p>
  {{ else }}      
    <p>Total: {{mentions|length}}</p>
    <ul>
      {{mentions}}
        <li>
          {{ url }}
          {{ author }}
            {{ name }}
          {{ /author }}
        </li>
      {{/mentions}} 
    </ul>
  {{ /if }}
{{/webmentions}}
```

## Usage (Vue)

If you want to pipe the mentions data to a Vue component, here's how.

```html
{{ webmentions url="https://sebastiandedeyne.com/"  }}
  {{ if no_results }}
    <p>No results.</p>
  {{ else }}
    <mention-list :mentions="{{ mentions | json | entities }}"></mention-list>
  {{/if}}
{{ /webmentions }}
```


## Mentions Schema

Each `mention` object exposes the following attributes that you can access in your template.

Learn more at [Webmention.io](https://webmention.io/)

```json
{
  "type": "entry",
  "author": {
    "type": "card",
    "name": "Tantek Çelik",
    "url": "http://tantek.com/",
    "photo": "http://tantek.com/logo.jpg"
  },
  "url": "http://tantek.com/2013/112/t2/milestone-show-indieweb-comments-h-entry-pingback",
  "published": "2013-04-22T15:03:00-07:00",
  "wm-received": "2013-04-25T17:09:33-07:00",
  "wm-id": 900,
  "content": {
    "text": "Another milestone: @eschnou automatically shows #indieweb comments with h-entry sent via pingback http://eschnou.com/entry/testing-indieweb-federation-with-waterpigscouk-aaronpareckicom-and--62-24908.html",
    "html": "Another milestone: <a href=\"https:\/\/twitter.com\/eschnou\">@eschnou<\/a> automatically shows #indieweb comments with h-entry sent via pingback <a href=\"http:\/\/eschnou.com\/entry\/testing-indieweb-federation-with-waterpigscouk-aaronpareckicom-and--62-24908.html\">http:\/\/eschnou.com\/entry\/testing-indieweb-federation-with-waterpigscouk-aaronpareckicom-and--62-24908.html<\/a>"
  },
  "mention-of": "https://indieweb.org/",
  "wm-property": "mention-of",
  "wm-private": false
}
```

## Roadmap
- [x] Add fancy Vue component example
- [ ] Expose method that talks to `https://webmention.io/api/count`, thereby getting a breakdown of the types of mentions.
