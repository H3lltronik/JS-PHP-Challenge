const rangeBody = {
    min: null,
    max: null,
    isWithinRange: function (number) {
        if (typeof number != 'number')
            throw `${number} is not a valid number!`
            
        if (number <= this.max && number >= this.min)
            return true

        return false
    },
    init: function (_min, _max) {
        this.min = _min
        this.max = _max
    }
}

exports.makeRange = function (min, max) {
    const newRange = Object.create (rangeBody)
    newRange.init (min, max)
    return newRange
}

exports.removeDuplicateCharacters = function (string) {
    return string.replace(/(.)\1+/g, '$1')
}