{{-- KRITERIA LINGKUNGAN PENGGUNA 2--}}
<div class="input-group-1">
    <label>Lingkungan Indekos</label>
        <div class="slider-container1">
            <span class="slider-mark-1 mark-9-1"></span>
            <span class="slider-mark-1 mark-8-1"></span>
            <span class="slider-mark-1 mark-7-1"></span>
            <span class="slider-mark-1 mark-6-1"></span>
            <span class="slider-mark-1 mark-5-1"></span>
            <span class="slider-mark-1 mark-4-1"></span>
            <span class="slider-mark-1 mark-3-1"></span>
            <span class="slider-mark-1 mark-2-1"></span>
            <span class="slider-mark-1 mark-1-1"></span>
            <span class="slider-mark-1 mark-0_50-1"></span>
            <span class="slider-mark-1 mark-0_33-1"></span>
            <span class="slider-mark-1 mark-0_25-1"></span>
            <span class="slider-mark-1 mark-0_20-1"></span>
            <span class="slider-mark-1 mark-0_16-1"></span>
            <span class="slider-mark-1 mark-0_14-1"></span>
            <span class="slider-mark-1 mark-0_12-1"></span>
            <span class="slider-mark-1 mark-0_11-1"></span>

            <input 
                type="range" 
                id="slider10u2" 
                name="C4-C5-U2"
                min="1" 
                max="17" 
                step="1" 
                value="9" 
                oninput="updateValue10u2(this.value)">
            <span class="value-label" id="sliderValue10u2">1</span>
            <div class="slider-tooltip-1" id="sliderTooltip10u2">1</div>

            <span class="slider-label-1 mark-9-1">9</span>
            <span class="slider-label-1 mark-8-1">8</span>
            <span class="slider-label-1 mark-7-1">7</span>
            <span class="slider-label-1 mark-6-1">6</span>
            <span class="slider-label-1 mark-5-1">5</span>
            <span class="slider-label-1 mark-4-1">4</span>
            <span class="slider-label-1 mark-3-1">3</span>
            <span class="slider-label-1 mark-2-1">2</span>
            <span class="slider-label-1 mark-1-1">1</span>
            <span class="slider-label-1 mark-0_50-1">2</span>
            <span class="slider-label-1 mark-0_33-1">3</span>
            <span class="slider-label-1 mark-0_25-1">4</span>
            <span class="slider-label-1 mark-0_20-1">5</span>
            <span class="slider-label-1 mark-0_16-1">6</span>
            <span class="slider-label-1 mark-0_14-1">7</span>
            <span class="slider-label-1 mark-0_12-1">8</span>
            <span class="slider-label-1 mark-0_11-1">9</span>
        </div>
    <label>Kondisi Kamar Indekos</label>
</div>

<script>
const slider10u2 = document.getElementById('slider10u2');
const sliderValue10u2 = document.getElementById('sliderValue10u2');
const sliderTooltip10u2 = document.getElementById('sliderTooltip10u2');

function updateValue10u2(value) {
    const snappedValue = values[value - 1];
    sliderValue10u2.innerText = snappedValue;
    slider10u2.setAttribute('data-snapped-value', snappedValue);
    sliderTooltip10u2.innerText = snappedValue;
}

slider10u2.addEventListener('input', (event) => {
    const value = parseInt(event.target.value);
    updateValue10u2(value);
});

updateValue10u2(slider10u2.value);
</script>





