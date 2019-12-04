# Webmentions

> A custom tag for Statamic v3

## Installation

```
composer require mattrothenberg/webmentions
```

## Usage

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
