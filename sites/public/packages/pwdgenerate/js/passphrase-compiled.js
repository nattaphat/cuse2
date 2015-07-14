var PASSPHRASE = PASSPHRASE || {};
PASSPHRASE.wordService = (function () {
    "use strict";
    var getWords = function getWords(url, fnSuccess, fnFail) {
        var word_1 = "",
            word_2 = "",
            JUST_VOWELS = "oiea",
            MIN_LEN = 10,
            PAIRS_PER_FETCH = 5,
            MIN_PAIRS_BEFORE_FETCH = Math.max(PAIRS_PER_FETCH / 2, 2),
            words_ready_dfd = $.Deferred();
        if (!getWords.pair_cache) {
            getWords.pair_cache = []
        }

        function setWordsIfNeeded() {
            if (getWords.pair_cache.length > 0) {
                if (words_ready_dfd.state() === "pending") {
                    var word_pair = getWords.pair_cache.shift();
                    words_ready_dfd.resolve(word_pair[0], word_pair[1])
                }
            }
        }
        setWordsIfNeeded();
        if (getWords.pair_cache.length <= MIN_PAIRS_BEFORE_FETCH) {
            if (!getWords.inFetch) {
                getWords.inFetch = true;
                $.ajax({
                    url: url,
                    data: {
                        min_combined_length: MIN_LEN,
                        singular_required_chars: JUST_VOWELS,
                        num_pairs: PAIRS_PER_FETCH
                    },
                    dataType: 'json'
                }).done(function (data) {
                    getWords.pair_cache = $.merge(getWords.pair_cache, data);
                    setWordsIfNeeded()
                }).fail(function () {
                    if (words_ready_dfd.state() === "pending") {
                        words_ready_dfd.reject()
                    }
                }).always(function () {
                    getWords.inFetch = false
                })
            }
        }
        return words_ready_dfd.promise()
    };
    return {
        getWords: getWords
    }
}());
PASSPHRASE.letterTransformer = (function () {
    "use strict";
    var word_1 = "",
        word_2 = "",
        letters = {
            setting: 2
        }, numbers = {
            setting: 1
        }, symbols = {
            setting: 1
        }, substitutions = [],
        passphrase = "",
        pp_len, initialCap = function (string) {
            return string.charAt(0).toUpperCase() + string.slice(1)
        }, setCharAt = function (str, index, chr) {
            if (index > str.length - 1) {
                return str
            }
            return str.substr(0, index) + chr + str.substr(index + 1)
        }, applyNumberTransform = function (sInput) {
            var JUST_VOWELS = "oiea",
                JUST_VOWELS_NUMS = "0134",
                ALL_DIGITS = "oizeasglbp",
                ALL_DIGITS_NUMS = "0123456789",
                use_numbers, number_subs, nletters = 0,
                positions = [],
                matches = [],
                sub, f1, l1, f2, l2, separator, output = sInput,
                i, j, max;
            numbers.reminder = "Don't use numbers";
            numbers.changed = "";
            numbers.changed_to = "";
            if (numbers.setting !== 0) {
                if (numbers.setting === 1) {
                    use_numbers = JUST_VOWELS;
                    number_subs = JUST_VOWELS_NUMS
                } else {
                    use_numbers = ALL_DIGITS;
                    number_subs = ALL_DIGITS_NUMS
                }
                f1 = 0;
                f2 = word_1.length + 1;
                l1 = word_1.length - 1;
                l2 = word_1.length + word_2.length;
                separator = word_1.length;
                for (i = 0, max = output.length; i < max; i += 1) {
                    if ((i !== separator) && (i !== f1) && (i !== l1) && (i !== f2) && (i !== l2)) {
                        j = use_numbers.search(output[i]);
                        if (j >= 0) {
                            nletters += 1;
                            positions.push(i);
                            matches.push(j)
                        }
                    }
                }
                if (nletters > 0) {
                    sub = 0;
                    if (nletters > 1) {
                        sub = Math.floor(Math.random() * nletters)
                    }
                    numbers.reminder = "Change one '%(changed)s' to a '%(changed_to)s'";
                    numbers.changed = output.charAt(positions[sub]);
                    numbers.changed_to = number_subs[matches[sub]];
                    substitutions.push(positions[sub]);
                    numbers.changed_pos = positions[sub];
                    output = setCharAt(output, positions[sub], number_subs[matches[sub]])
                }
            }
            return output
        }, applyLetterTransform = function (sInput) {
            var cap, cap_pattern, f1, l1, f2, l2, output = sInput;
            letters.reminder = "Use lower case letters";
            letters.changed = "";
            if (letters.setting === 1) {
                output = initialCap(sInput);
                cap = word_1.length + 1;
                output = setCharAt(output, cap, output.charAt(cap).toUpperCase());
                letters.reminder = "Use initial capitals";
                substitutions.push(0);
                substitutions.push(cap);
                letters.changed_pos = 0
            } else if (letters.setting === 2) {
                cap_pattern = Math.floor(Math.random() * 4);
                f1 = 0;
                f2 = word_1.length + 1;
                l1 = word_1.length - 1;
                l2 = word_1.length + word_2.length;
                if (cap_pattern === 0) {
                    letters.reminder = "Capitalize both first letters";
                    substitutions.push(f1);
                    substitutions.push(f2);
                    letters.changed_pos = f1;
                    output = setCharAt(output, f1, output.charAt(f1).toUpperCase());
                    output = setCharAt(output, f2, output.charAt(f2).toUpperCase())
                } else if (cap_pattern === 1) {
                    letters.reminder = "Capitalize both last letters";
                    substitutions.push(l1);
                    substitutions.push(l2);
                    letters.changed_pos = l1;
                    output = setCharAt(output, l1, output.charAt(l1).toUpperCase());
                    output = setCharAt(output, l2, output.charAt(l2).toUpperCase())
                } else if (cap_pattern === 2) {
                    letters.reminder = "Capitalize the first & last letter";
                    substitutions.push(f1);
                    substitutions.push(l2);
                    letters.changed_pos = f1;
                    output = setCharAt(output, f1, output.charAt(f1).toUpperCase());
                    output = setCharAt(output, l2, output.charAt(l2).toUpperCase())
                } else if (cap_pattern === 3) {
                    letters.reminder = "Capitalize the last & first letter";
                    substitutions.push(l1);
                    substitutions.push(f2);
                    letters.changed_pos = l1;
                    output = setCharAt(output, l1, output.charAt(l1).toUpperCase());
                    output = setCharAt(output, f2, output.charAt(f2).toUpperCase())
                } else {
                    letters.reminder = "Capitalize both first & last letters";
                    substitutions.push(f1);
                    substitutions.push(l1);
                    substitutions.push(f2);
                    substitutions.push(l2);
                    letters.changed_pos = f1;
                    output = setCharAt(output, f1, output.charAt(f1).toUpperCase());
                    output = setCharAt(output, l1, output.charAt(l1).toUpperCase());
                    output = setCharAt(output, f2, output.charAt(f2).toUpperCase());
                    output = setCharAt(output, l2, output.charAt(l2).toUpperCase())
                }
            }
            return output
        }, applySymbolTransform = function (sInput) {
            var BASIC_SYMBOLS = "@:-=!%.+#?_",
                N_BASIC_SYMBOLS = 11,
                ALL_SYMBOLS = "!\"#$%&\'()*+,-./:;<=>?@[\\]^_{|}~",
                N_ALL_SYMBOLS = 31,
                use_symbols, nsymbols, pos_of_symbol, separator, output = sInput;
            if (symbols.setting === 0) {
                separator = BASIC_SYMBOLS[6]
            } else {
                if (symbols.setting === 1) {
                    use_symbols = BASIC_SYMBOLS;
                    nsymbols = N_BASIC_SYMBOLS
                } else {
                    use_symbols = ALL_SYMBOLS;
                    nsymbols = N_ALL_SYMBOLS
                }
                separator = use_symbols[Math.floor(Math.random() * nsymbols)]
            }
            pos_of_symbol = word_1.length;
            output = sInput.substr(0, pos_of_symbol) + separator + sInput.substr(pos_of_symbol);
            symbols.reminder = "Separate words with a '%(changed_to)s'";
            symbols.changed = "";
            symbols.changed_to = separator;
            substitutions.push(pos_of_symbol);
            symbols.changed_pos = pos_of_symbol;
            return output
        }, applyRandomTransforms = function (sInput, aPrevious) {
            var output;
            do {
                output = applySymbolTransform(sInput);
                output = applyNumberTransform(output);
                output = applyLetterTransform(output)
            } while (aPrevious.indexOf(output) !== -1);
            return output
        }, applyCharTransforms = function (win_1, win_2) {
            var input = "".concat(win_1, win_2);
            word_1 = win_1;
            word_2 = win_2;
            passphrase = "";
            substitutions = [];
            passphrase = applyRandomTransforms(input, []);
            substitutions.sort(function (a, b) {
                return a - b
            });
            pp_len = passphrase.length;
            return
        }, getPassphrase = function () {
            return passphrase
        }, getPp_len = function () {
            return pp_len
        }, setLetters = function (iValue) {
            letters.setting = Number(iValue)
        }, setNumbers = function (iValue) {
            numbers.setting = Number(iValue)
        }, setSymbols = function (iValue) {
            symbols.setting = Number(iValue)
        }, getLetters = function () {
            return letters
        }, getNumbers = function () {
            return numbers
        }, getSymbols = function () {
            return symbols
        }, getSubstitutions = function () {
            return substitutions
        };
    return {
        applyCharTransforms: applyCharTransforms,
        setLetters: setLetters,
        setNumbers: setNumbers,
        setSymbols: setSymbols,
        getPassphrase: getPassphrase,
        getPp_len: getPp_len,
        getLetters: getLetters,
        getNumbers: getNumbers,
        getSymbols: getSymbols,
        getSubstitutions: getSubstitutions
    }
}());
PASSPHRASE = (function () {
    "use strict";
    var word_1 = "",
        word_2 = "",
        ws = PASSPHRASE.wordService,
        lt = PASSPHRASE.letterTransformer,
        getWords = function getWords(url, fnSuccess, fnFail) {
            var word_pair = [],
                promise = ws.getWords(url, fnSuccess, fnFail);
            promise.done(function (word1, word2) {
                word_1 = word1;
                word_2 = word2
            });
            return promise
        }, switchWords = function () {
            var temp = word_1;
            word_1 = word_2;
            word_2 = temp
        }, applyCharTransforms = function () {
            lt.applyCharTransforms(word_1, word_2);
            return
        }, getWord_1 = function () {
            return word_1
        }, getWord_2 = function () {
            return word_2
        }, setWord_1 = function (iValue) {
            word_1 = iValue
        }, setWord_2 = function (iValue) {
            word_2 = iValue
        };
    return {
        getWords: getWords,
        switchWords: switchWords,
        applyCharTransforms: applyCharTransforms,
        setWord_1: setWord_1,
        setWord_2: setWord_2,
        getPassphrase: lt.getPassphrase,
        getPassphrase_1: lt.getPassphrase,
        getWord_1: getWord_1,
        getWord_2: getWord_2,
        getPp_len: lt.getPp_len,
        setLetters: lt.setLetters,
        setNumbers: lt.setNumbers,
        setSymbols: lt.setSymbols,
        getLetters: lt.getLetters,
        getNumbers: lt.getNumbers,
        getSymbols: lt.getSymbols,
        getSubstitutions: lt.getSubstitutions
    }
}());