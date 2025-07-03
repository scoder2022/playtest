<template>
  <div class="p-6 bg-black min-h-screen text-white">
    <h1 class="text-2xl font-bold mb-6 text-center">Team Winning Percentages</h1>

    <div class="flex justify-center mb-6">
      <button
        @click="simulateMatch"
        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition"
      >
        Simulate Match
      </button>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
      <div
        v-for="team in teams"
        :key="team.id"
        class="bg-green-700 rounded-xl p-3 text-center shadow-md"
      >
        <div class="flex items-center justify-between mb-2">
          <span class="text-xs font-bold text-yellow-200">🌟</span>
          <span class="text-base font-bold uppercase">{{ team.name }}</span>
          <span class="w-4 h-4 bg-orange-500 rounded-sm"></span>
        </div>

        <div
          class="text-lg font-bold mt-1 transition-all duration-300"
          :class="getColor(team.winning_percentage)"
        >
          {{ team.winning_percentage }}%
        </div>
      </div>
    </div>

  </div>
</template>

<script setup lang="ts">
import { onMounted, onBeforeUnmount, ref } from 'vue'
import axios from 'axios'

const teams = ref([])
let intervalId = null

const fetchTeams = async () => {
  const res = await axios.get('/api/winning-chances')
  teams.value = res.data.teams
}

const simulateMatch = async () => {
  await axios.post('/api/simulate-match')
  fetchTeams()
}

const getColor = (percent) => {
  if (percent >= 35) return 'text-green-300'
  if (percent >= 20) return 'text-yellow-200'
  return 'text-red-300'
}

onMounted(() => {
  fetchTeams()
  intervalId = setInterval(simulateMatch, 4000)
})

onBeforeUnmount(() => {
  clearInterval(intervalId)
})
</script>
