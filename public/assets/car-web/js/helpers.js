const toKebabCase = str =>
    str &&
    str
        .match(/[A-Z\u00C0-\u00D6\u00D8-\u00DE]]{2,}(?=[A-Z][a-z]+[0-9]*|\b)|[A-Z]?[a-z]+[0-9]*|[A-Z]|[0-9]+/g)
        .map(x => x.toLowerCase())
        .join('-');
