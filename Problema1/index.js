const {readFile, writeFile} = require('fs');
const utils = require("./utils")

const validCharsRegex = /^[a-zA-Z]+$/g
const lengthMsgRange = utils.makeRange (3, 5000);
const lengthInstructRange = utils.makeRange (2, 50);

const inputFilename = "input.txt";
const outputFilename = "output.txt";

const foundResultWord = "SI";
const notFoundResultWord = "NO";

readFile(inputFilename, 'utf8', (_, data) => {
    const lines = data.replace(/\r\n/g,'\n').split("\n").map(x => x.trim());
    const instructLines = [...lines].splice (1, lines.length - 2)
    let msgLine = [...lines].splice (lines.length - 1, lines.length)[0]

    if (!msgLine.match(validCharsRegex))
        throw "Invalid characters on the msg line";
    instructLines.forEach (instructionLine => {
        if (!instructionLine.match(validCharsRegex))
            throw `Invalid characters in ${instructionLine}`
    })

    const lengthsArr = lines [0].split(/\s/g).map(x => Number(x));

    let instructsLengthsArr = [...lengthsArr].splice (0, [...lengthsArr].length - 1);

    if (lines.length < 3) { // Checking for total lines in the doc
        throw "There should be at least one instruction to search for in the msg string, therefore, there should be at least 4 lines in the file"
    }

    if (lines.length - 1 != instructsLengthsArr.length + 1) { // Checking for inconsistent lenghts/instructions
        throw `Inconsistent line lengths to instructions/message. ${lines.length - 1} found but ${instructsLengthsArr.length + 1} declared`
    }

    if (!lengthMsgRange.isWithinRange (lengthsArr[lengthsArr.length - 1])) // Message length check
        throw `Message length is out of the boundaries ${lengthMsgRange.min} - ${lengthMsgRange.max}`

    msgLine = msgLine.slice (0, lengthsArr[lengthsArr.length - 1])
    
    instructsLengthsArr.forEach((instructLength, index) => {
        if (!lengthInstructRange.isWithinRange (instructLength)) // Instruction length check
            throw `Instruction length is out of the boundaries ${lengthInstructRange.min} - ${lengthInstructRange.max}`

        instructLines[index] = instructLines[index].slice (0, instructLength)
    });

    let result = "";
    instructLines.forEach(instructLine => {
        const doContainsIt = utils.removeDuplicateCharacters (msgLine).toLowerCase().match (instructLine.toLowerCase()) 
        if (doContainsIt)
            result += `${foundResultWord}\n`
        else
            result += `${notFoundResultWord}\n`
    });

    writeFile (outputFilename, result, () => {});
})