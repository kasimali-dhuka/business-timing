$('.addTimeZoneBtn').click(function (e) { 
    e.preventDefault();
    let inputsr = $(this).attr('data-inputsr')

    let inputsWrapper = $(this).closest('.timing-input-container').find('.timing-inputs')
    let inputs = inputsWrapper.find(`.inputs-container[data-sr=${inputsr}]`)
    let {sr, week} = $(inputs).data()
    let newElement = $(inputs).clone(true)
    let updatedSr = Number(inputsr) + 1
    
    newElement.attr('id', `${week}_timing_${updatedSr}`)
    newElement.attr('data-sr', updatedSr)
    $(this).attr('data-inputsr', updatedSr)

    inputsWrapper.append(newElement)
});

$('.delete-timezone-btn').click(function (e) { 
    e.preventDefault();
    $(this).closest('.inputs-container').remove()
});