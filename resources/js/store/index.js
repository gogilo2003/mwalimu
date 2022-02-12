import Vue from 'vue'
import Vuex from 'vuex'

import schools from './schools'

Vue.use(Vuex)

export default new Vuex.Store({
    modules:{schools}
})

