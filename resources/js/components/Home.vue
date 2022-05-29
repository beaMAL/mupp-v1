<template>
    <v-app id="inspire">
        <div>
            <section
                data-v-8e45d7f4=""
                id="home"
                class="section-wave bg-home home-half"
                style="
                    background-size: cover;
                    background-position: center center;
                "
            >
                <div data-v-8e45d7f4="" class="bg-overlay"></div>
                <div data-v-8e45d7f4="" class="display-table">
                    <div data-v-8e45d7f4="" class="display-table-cell">
                        <div data-v-8e45d7f4="" class="container">
                            <div data-v-8e45d7f4="" class="row">
                                <div
                                    data-v-8e45d7f4=""
                                    class="col-lg-8 offset-lg-2 text-white text-center"
                                    style="position: relative"
                                >
                                    <h1 data-v-8e45d7f4="" class="home-title">
                                        BIENVENIDO A
                                        <span class="font-weight-thin">M</span
                                        >UPP
                                    </h1>
                                    <p
                                        data-v-8e45d7f4=""
                                        class="padding-t-15 home-desc"
                                    >
                                        Etiam sed.Interdum consequat proin
                                        vestibulum class at.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div data-v-8e45d7f4="" class="wave-effect wave-anim">
                    <div data-v-8e45d7f4="" class="waves-shape shape-one">
                        <div
                            data-v-8e45d7f4=""
                            class="wave wave-one"
                            style="
                                background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAB9AAAAB4CAMAAACdDplGAAAAUVBMVEVHcEz///////////////////////////////////////////////////////////////////////////////////////////////////////9jlXTzAAAAGnRSTlMAEhz1ZnzdM5nO6UBxKAi+S6y0WYfGkFKiYn7vrJYAAAkxSURBVBgZ7cAHgttIkkDRSCAtvDWM+x90S61etTRyZcgizH8CAAAAAAAAAAAAAKfUhC/sV1X8aks/U1Wf/jPE/0z2my6EYAQAADxMHUJprZ3iizm90MfxKaU+xuistWUIwQgAAHiXOgRrXYxxTsnr8/mUUh9jrOwYghEAAPAbWQg362Kck9fdS2mI0do1hEYAALg4E8JoqxiHlPS4fOqjs13IBACA62hCaV3sU8r1bIrUxsmOIRMAAE4qC6Nd4pz0EtIcJ1sGAR4iC1+s9psq/mdIQ/xmst+M4ataAODtQrBV7FOh15SnIVa3kAnwbuGFtbaKMfYppULvIb3oY4yTtbcQggDAL2VhtVOck+JfqV9sWQvwGk0Io3VxSynXT5NS6mN0dg21ALi8JoxVbJPiN3wbqzU0AvykDp2tYmyT1+dLaYuV7UImAC6mLu3Sp1zxKkWK1VoLIE3o7BRT0r3K0xxjZctgBMCZZeHm4uwV75H66RYawRVlYazikHI9kCK1cbFdaATAeTRhtXFIio/z7WKDEVxDKO0UZ6+Hlqc+2jEYAXBkYXRbKhR3VszRhkZwWllp4+D1XFIbqzE0AuBQTLDL4BWP5Hu3ZoJTacJt2pKeWZGiG0MjAPau7qqYcsUnyedoQyM4vLqr4lzoZRQpulswAmB/TLBTnxTP4HvXZYJjyjrXJ72ooo22zATAPtRdFedC8WRF70ojOJJwW9pCkadYdbUAeJ6srLak2BHfV2Uj2L2sq7ak+EHq3VgLgM/VhNvSFopdSlsVBHtVj0tbKH4nxao0AuAT1KvrvWLvUhwzwb5k3dTmir8rhmmsBcCjmNLGOVccRtFXpWAXmrLqveJN0laVRgDcVRinoVAcUN5OnRE8U32LSfFOvnelEQAfZ8pqS4pj89tYC57AdFObKz7K964zAuC9ss71XnESxeCC4BOZbpoV9+N71xkB8DbZ6oZCcTb5UNWCT5Ct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');
                            "
                        ></div>
                    </div>
                    <div data-v-8e45d7f4="" class="waves-shape shape-two">
                        <div
                            data-v-8e45d7f4=""
                            class="wave wave-two"
                            style="
                                background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAB9AAAACqCAMAAADC+CRiAAAAS1BMVEVHcEz////////////////////////////////////////////////////////////////////////////////////////////////ScsZwAAAAGHRSTlMAWn+5mEruM2fMjPcc43PXKD4NpMOtBxONUwMyAAAK/0lEQVQYGe3ACWLcOJJA0QAIEAD3nXH/k47s6XaXy5atlHIhyP8EAADgWLbwjYnvMuHNIAAA4DBCCCZG69yaUir1RunN7FwX4xjCLgAA4HlC8LFzbkmt3lmbClfFGMImAADgIZpgOremWp+iTYWzMQwCAADuIYzRuqXXF2nTXEUfNgEAAJ8QTHRzKvUg6jRbEzYBAAAfsgVTrb0eU7u4zg8CAADeNYVYFa1moC8qMwgAAPjJPkZXtJqZNHe+EQAAIDIYt5Sar3JxcdwEAIDLGky11HoKvYtBAAC4msbbotSTSc4MAuC0hvATE7/z4WeDABexe1u0elb1UplGAGQrvBnjN+7NnN70+gnpu9V9E2M0IYRGgNMYu7XV82vXbhAAWRhCMDE655aUan24PqXknLMxhtAIkKPN26LW6yiLbhQAB9QEH6NzLqWkr9anxTkb4xgaATIwebvoBdWF9ZMAOIAm+BidS6nWoypT4Wz0oRHgkCZfLXplqfKTAHiJMMbo3JJKzUqbVmejDwIcxe6rpFAt7CgAnqYJpnNrKjV3ZZpd9GET4IU2X/WKH8o1DgLgkbbgY+VSr6dTptlFHzYBnq3pilrxb+1sdgFwd8F0rki1nl6ZXGeCAM+x+apVvCdVowC4jy2Yzi2tXk1fuDg2AjxS0xW14s/K2UwC4AumYKxLrV5bmqsYNgHubvNVq/iYomsEwO2CsS6Vih/61ZpBgLtpuqJW3KKvRgHwUVuI1dorfi+5zjcCfFVjF8UnlLOZBMCfbSFWRav4q3JxMWwCfNJge8XnFXEXAL81hVgVreIm/dyNmwA3CrZVfFURdwHwk8FURav4rN7FIMBHjVWruI8i7gLgm22MLinuILk4CPA33pWKeyriLsC1Nb6be8U91UtlBgHeE6pScX9F3AW4psFURat4jHLtRgF+0dhe8SiF2QS4lsG4pVY8WF1YPwnwwx4XxUOV8yjARTS+KmrF0/SVaQQQ2cyqeILWDgKc3DZ2a6t4vnaOg+Da/FwqnmWJuwBnNUTXK16oXGMjuKjGtoqnqlcvwOk0plpqxQG0s9kFl2MKxQuULghwHkOcW8WR9JWfBNcxVKXiVVK3C3ACY1eUiiMq7Ci4gs0sipeq51GAnE3eFrXiwOqiGwTnFlypeL2+2wXI0m6qpMhBW/lNcFYmKY5iHQXITGPmXpGReo2N4Hz2rlUcSd/tAuSiMXOryFCyQXAqg6sVR1PPQYDjm3zVK/LVOj8JTmIsFMeUzCbAgW3eLors1UVsBNnbYlIcV2l3AY5ptEWtOIveDoKc7bZUHFs9BwGOZohrqTiZ3g6CTAVXKzKweAGOY/KuVZxTbwdBfnyhyEXfTQIcwdAVilPrbRDkZIq9Iidl1QjwWpN3reICehsEmZhsqcjOOgrwMkNX1IrLaG0QHN9kS0WWkhHgBTZftYqr6W0jOLTJlopstXET4KmaWNSKa1riJDiqRkpF1tpuEuBZBpsUV1avXnBEu6tFkbvS7gI8QahaBcoqCA5msrWqKPJXV40Aj+Vdq8D/67tGcByTLfWNKM6gdoMAjzL5tVTgnwozCQ5hsqV+J4qTmAcBHmCPRa3AL+p5FLzcZEv9D1GcRjEKcF9Ntyjwnj5OgleabKk/iOJEFi/A3TTdosAf1S4IXmWypf6DKE6lNwLcw94tCnxAipPgBXZb6k9EcTJt3AT4mj0uCnxU6YLgyRpX67+I4nTKbhLg0yZTKHCbxWyC5wmz/koUJ1RWuwCfsfm1VuB2ZTUInmMs9HdEcUq1awS41ehKBT5rMYLHM0l/TxRnNQcBbtDYVoEvabtd8EhbbPU9ojivYhTgYyazKPB1tRsEj7LbUt8nijNLZhPgr/xcK3AnhRc8Qphr/RNRnFtpGwH+ZLCtAvfUx01wX5tJ+heiOL15FOAdU1wUuLvS7oL7aapS/0oUF5DiJsCv/For8BC1GwT3Ma76EaK4hLJqBPjJ3rUKPNA6Cr5sir1+jCiuYh0F+GGcawUebDGCLxmqUj9KFNfRx0mAN3vXK/AMbZwEn7SZRW8giispq0FweWGuFXiWsmoEnxCqUm8iiotJcRdc2BSTAk9Vz0FwmykueitRXE49e8FFBVcr8HyLF3zcONd6O1FcUWsbweVMMSnwIq3dBR/R2FY/RRQXVZhNcCXjXCvwQvU8Cv5iMot+liguq3Sj4CIG2yvwcn2cBO/zc62fJ4or67tdcHpNlxQ4htoNgt8aXalfIoqLW80mOLE9LgocSYq74F9C1epXieLy6tkLzqnpFgUOp1694H8G2+sdiAKqpRsFZzPYXoGDaqtB8M1ge70PUeC7tgqC8/BVq8ChLXGXqwu217sRBf6rrYLgBBqzlgpkoDCTXJevWr0nUeAf2ioIsjbapEA26tVvckG7WUu9M1HgZ23lBXlqzFoqkJly9nItg130AUSBX5SrmQR5mXyVFMhTuZpdrmHzrtXHEAV+q4iNIBOTr5ICeSu6Qc6uiUWtDyMKvCfZIDi6zVeLAqfQVl7Oa7S9PpQo8Aet84LD2rxdFDiTcjW7nM/QraU+mijwZ/VqGsHhbKMtFDijxQ5yIo2ZW30GUeDv+spvguMYbVErcF5t5eUMGuN6fRZR4EPqoguCAxhtUStwenVh/SYZG+Lc6jOJAh9WzqYRvE7jq6VW4DqWyu+SodCtpT6bKHCTvvKT4PnGbm0VuKDemUby0ZhqqfUVRIGbFXbcBE/TmGpR4MraOQ5yeJO3a6svIwp8ylL5SfBou+/WVgGolkU3TnJQu+/mXl9LFPi0vjKN4EGmsZtbBfBPbWHNIIcymKpo9QBEgS9p5zgI7msau7lXAO9Irht3ebnBdy7pYYgCX9auXRDcxT52c68A/qotKhPkNYKxc9KDEQXuIzkzCL5gMFXRKoBb9KuLPmzyHFMwnSt6PSRR4H7qpTKN4Fb72M1JAXxanVYXfdjkMfbgYzWnWo9MFLizsrB+F3xMMFXRKoD7qNPqogmhkTuYQojRzanXLIgCj9CunW8E79uCsWuvAB6kT8m5KkYfwiQfFN6YGJ0rUqo1M6LAw5SLi+Mk+Nk+Rle0CuCZ6vQfs/u3Ob3pNXeiwIO1qzWD4E3jO7eUCgD3Jwo8RXKdH+SqhjFWa1IAeBhR4InSWsWwy3UEH13RKwA8mijwdGVynQlyZnsw1qVWAeBJRIFX6QvXmbDLmYQxWrckBYAnEwVeLRWuM6GRjA0hdm5NtQLAi4gCR5EK18UxTJKLJvjYuTm1CgCvJgocTp9m10UfdjmgJowxOpdSrQBwHKLAgbVpdS5GE8Iur9OE4GO0zi2pVAA4JFEgFykVznUx+hDCJo+0h+BjtM6tKbUKABkQBXKVUiqcczZ+48N3cpMtvPHxjXVvlvRGASBHosAZten3egWAUxIFAADZEwUAANkTBQAA2RMFAADZEwUAANkTBQAA2RMFAADZEwUAANkTBQAA2RMFAADZEwUAANkTBQAA2RMFAADZEwUAANkTBQAA2RMFAADZEwUAANkTBQAA2RMFAADZEwUAANkTBQAA2RMFAADZEwUAANkTBQAA2RMFAADZEwUAANkTBQAA2RMFAADZEwUAANkTBQAA2RMFAADZEwUAANkTBQAA2RMFAADZEwUAANkTBQAA2RMFAADZEwUAANkTBQAA2RMFAADZEwUAANkTBQAA2RMFAADZEwUAANkTBQAA2RMFAADZEwUAANkTBQAA2RMFAADZEwUAANkTBQAA2RMFAADZ+z9q8nmN+JHwvwAAAABJRU5ErkJggg==');
                            "
                        ></div>
                    </div>
                    <div data-v-8e45d7f4="" class="waves-shape shape-three">
                        <div
                            data-v-8e45d7f4=""
                            class="wave wave-three"
                            style="
                                background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAB9AAAADcCAMAAAAfg8q+AAAAQlBMVEVHcEz////////////////////////////////////////////////////////////////////////////////////1bZCPAAAAFXRSTlMACL1PNd3szJlnEoomsaRD9nxcG3JGkF3RAAAMRElEQVQYGe3AB2LcRhZF0Q+gInJ6+9/qjCU5yBapJtkBBdxjAAAAAAAAAAAAAAAAAAAAAAAAAADgh965Kf8h/aGOf/L6S/wh/ZC/W90fKgMAAM+3OZdzl9IQY9Rd+BiHlLqcV+c2AwAAj9K7NXdpiFEPN8eY0p4b1xsAALgHN+UlDTHoRWIcU25cawAA4OP6KXdjDDqMGFOXJ2cAAOD3KrcuKXod1hyHLk+9AQCAX+mnPcWgUsQh5ak3AADww9bsY1SZfJ3ytBkAAFfWupzirOKFmPK0GQAAl9NOy+B1KiGmPLUGAMA1VNM+ep1VqFN2lQEAcGYuj1EX4Md9ag0AgPPp1y7qUvywTK0BAHAWbdPVQdfkh6XZDACAwrVNF3V1YVimygAAKFPVdFH4Iaa1NwAAylJNXRT+JQzL1BoAAEWopq4W3uLT2hsAAMc2dbXwO2FYnAEAcExtMwbhRnO9OAMA4GD6pRY+aK6XyQAAOIhq6rzwOXO9TAYAwKtteZiFL5nrZTIAAF7GLVG4i3nYewMA4Plc54V78qlpDQCAJ+oXLzxAvTgDAOAp+sULDxOGvBkAAI/VL154NN9NlQEA8CDbEoXnmOu8GQAAd9fmKDxVXJwBAHBP0zALz+dTUxkAAHfRL154lXlYWwMA4IuqtRZerF56AwDg81wKwhH4bjIAAD6jXbxwHGFsDACAD3LjLBxMGBsDAOBmVY7CIYWxqQwAgBtsXRCOK4xNZQAAvG8ahKMLY1MZAABvqbIXijCPTWUAAPzC1gWhHPPYVAYAwM/6NAuFCWkyAAD+5gahSL7rDQCAb5oolCvumwEALq9avVC4eq0MAHBlVfbCCcxjYwCAq6qyF84idM4AAFeUvXAqftkMAHAx2QvnU6+VAQCuozLhnEJyBgC4iD6acFoxtwbgXb37Q/6H9EP+bnXfbQYc2DLLhBObx8kA/KV3U855SSkNMcagT/AxxiGlnBvnDDiGPkoy4dz8shlwZb1rck6p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');
                            "
                        ></div>
                    </div>
                </div>
            </section>
            <section data-v-8e45d7f4="" id="services" class="section-wave pt-5">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 offset-lg-2">
                            <h1 class="section-title text-center">
                                Our Services
                            </h1>
                            <div class="section-title-border margin-t-20"></div>
                            <p
                                class="section-subtitle text-muted text-center padding-t-30 font-secondary"
                            >
                                We craft digital, graphic and dimensional
                                thinking, to create category leading brand
                                experiences that have meaning and add a value
                                for our clients.
                            </p>
                        </div>
                    </div>
                    <div class="row margin-t-30">
                        <div class="col-lg-4 margin-t-20">
                            <div class="services-box text-center hover-effect">
                                <i class="pe-7s-diamond text-custom"></i>
                                <h4 class="padding-t-15">Digital Design</h4>
                                <p class="padding-t-15 text-muted">
                                    Some quick example text to build on the card
                                    title and make up the bulk of the card's
                                    content. Moltin gives you the platform.
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-4 margin-t-20">
                            <div class="services-box text-center hover-effect">
                                <i class="pe-7s-display2 text-custom"></i>
                                <h4 class="padding-t-15">Unlimited Colors</h4>
                                <p class="padding-t-15 text-muted">
                                    Credibly brand standards compliant users
                                    without extensible services. Anibh euismod
                                    tincidunt ut laoreet.
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-4 margin-t-20">
                            <div class="services-box text-center hover-effect">
                                <i class="pe-7s-piggy text-custom"></i>
                                <h4 class="padding-t-15">Strategy Solutions</h4>
                                <p class="padding-t-15 text-muted">
                                    Separated they live in Bookmarksgrove right
                                    at the coast of the Semantics, a large
                                    language ocean necessary regelialia.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row margin-t-30">
                        <div class="col-lg-4 margin-t-20">
                            <div class="services-box text-center hover-effect">
                                <i class="pe-7s-science text-custom"></i>
                                <h4 class="padding-t-15">Awesome Support</h4>
                                <p class="padding-t-15 text-muted">
                                    It is a paradisematic country, in which
                                    roasted parts of sentences fly into your
                                    mouth leave for the far World.
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-4 margin-t-20">
                            <div class="services-box text-center hover-effect">
                                <i class="pe-7s-news-paper text-custom"></i>
                                <h4 class="padding-t-15">Truly Multipurpose</h4>
                                <p class="padding-t-15 text-muted">
                                    Even the all-powerful Pointing has no
                                    control about the blind texts it is an
                                    almost unorthographic.
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-4 margin-t-20">
                            <div class="services-box text-center hover-effect">
                                <i class="pe-7s-plane text-custom"></i>
                                <h4 class="padding-t-15">Easy to customize</h4>
                                <p class="padding-t-15 text-muted">
                                    Question Marks and devious Semikoli, but the
                                    Little Blind Text didn’t listen. She packed
                                    her seven versalia.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </v-app>
</template>
<style>

.text-muted {
    color: #a8aeb4 !important;
}
.services-box i {
    font-size: 32px;
    height: 68px;
    width: 68px;
    background-color: #fff;
    border-radius: 50%;
    box-shadow: 0 0 1.25rem rgba(108,118,134,.1)!important;
    line-height: 68px;
    margin-bottom: 15px;
}
.hover-effect {
    transition: all .3s ease-in-out;
}
.services-box {
    padding: 15px 10px;
}
.section-title-border {
    width: 50px;
    height: 2px;
    margin-right: auto;
    margin-left: auto;
}
    .section-title-border, .services-box:hover i, .bg-custom, .btn-custom, .features-item-list li:before, .process-left-icon-1 i, .process-left-icon-2 i {
    background-color: #f09105 !important;
}
  .section-title {
    text-transform: uppercase;
    letter-spacing: 2px;
    margin-bottom: 0px;
    padding-bottom: 1rem;
    line-height: 1;
    font-size: 1.75rem;
    font-weight: 500;
}
@media (max-width: 768px) {
    .wave-one,
    .wave-three {
        background-size: 50% 50px;
    }
    .wave-two {
        background-size: 50% 70px;
    }
}
@media (max-width: 1024px) {
    .home-half {
        padding-bottom: 100px;
        padding-top: 120px;
    }
}

.wave-effect {
    position: absolute;
    left: 0;
    right: 0;
    bottom: 0;
    margin: auto;
    height: 150px;
    overflow: hidden;
}

.shape-one {
    z-index: 15;
    opacity: 0.5;
}
.shape-two {
    z-index: 10;
    opacity: 0.75;
}
.shape-three {
    z-index: 5;
}

.wave {
    position: absolute;
    left: 0;
    width: 200%;
    height: 100%;
    background-repeat: repeat no-repeat;
    background-position: 0 bottom;
    transform-origin: center bottom;
}

.waves-shape {
    position: absolute;
    bottom: -1px;
    width: 100%;
    height: 100%;
    overflow: hidden;
}

.wave-one {
    background-size: 50% 100px;
}

.wave-anim .wave-one {
    animation: move-wave 3s;
    -webkit-animation: move-wave 3s;
    -webkit-animation-delay: 1s;
    animation-delay: 1s;
}
.wave-two {
    background-size: 50% 120px;
}
.wave-anim .wave-two {
    animation: move_wave 10s linear infinite;
}
.wave-three {
    background-size: 50% 100px;
}
.wave-anim .wave-three {
    animation: move_wave 15s linear infinite;
}

@keyframes move_wave {
    0% {
        transform: translateX(0) translateZ(0) scaleY(1);
    }
    50% {
        transform: translateX(-25%) translateZ(0) scaleY(0.55);
    }
    100% {
        transform: translateX(-50%) translateZ(0) scaleY(1);
    }
}

.display-table-cell {
    display: table-cell;
    vertical-align: middle;
}
.display-table {
    display: table;
    width: 100%;
    height: 100%;
}
.bg-overlay {
    background: linear-gradient(to right, #512da8, #711e72);
    opacity: 0.75;
    position: absolute;
    height: 100%;
    width: 100%;
    right: 0;
    bottom: 0;
    left: 0;
    top: 0;
}
.home-half {
    padding-bottom: 150px;
    padding-top: 220px;
}
.bg-home {
    background: url("C:/xampp/htdocs/mupp-v1/resources/img/lowpoly-purple1.png");
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
}
.section-wave {
    padding-bottom: 20em;
    padding-top: 80px;
    position: relative;
}
</style>
