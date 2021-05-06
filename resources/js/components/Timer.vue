<template>
    <div class="col-md-8 col-md-offset-2">
        <div>
            <div>
                <!-- Create Timer Modal -->
                <div id="timerCreate">
                    <div>
                        <div>
                            <div>
                                <h4>Record Time</h4>
                            </div>
                            <div>
                                <div class="form-group">
                                    <input v-model="newTimerName" type="text" class="form-control" id="usrname"
                                        placeholder="What are you working on?">
                                </div>
                            </div>
                            <div>
                                <button v-bind:disabled="newTimerName === ''"
                                    @click="createTimer(task)" type="submit"
                                    class="btn btn-default btn-primary">
                                    <i class="bi bi-play"></i>
                                    Start
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- <div class="panel-body">
                    <ul class="list-group" v-if="task.timers.length > 0">
                        <li v-for="timer in task.timers" :key="timer.id" class="list-group-item clearfix">
                            <strong class="timer-name">{{ timer.name }}</strong>
                            <div class="pull-right">
                                <span v-if="showTimerForProject(task, timer)" style="margin-right: 10px">
                                    <strong>{{ activeTimerString }}</strong>
                                </span>
                                <span v-else style="margin-right: 10px">
                                    <strong>{{ calculateTimeSpent(timer) }}</strong>
                                </span>
                                <button v-if="showTimerForProject(task, timer)" class="btn btn-sm btn-danger"
                                    @click="stopTimer()">
                                    <i class="glyphicon glyphicon-stop"></i>
                                </button>
                            </div>
                        </li>
                    </ul>
                    <p v-else>Nothing has been recorded for "{{ task.name }}". Click the play icon to record.</p>
                </div> -->
            </div>
        </div>
    </div>
</template>

<script>
    import moment from 'moment'
    export default {
        data() {
            return {
                task: null,
                newTimerName: '',
                activeTimerString: 'Calculating...',
                counter: {
                    seconds: 0,
                    timer: null
                },
            }
        },
        props: [
            'taskId'
        ],
        created() {
            window.axios.get('/tasks/').then(response => {
                this.tasks = response.data
                console.log(taskId);
                window.axios.get('/tasks/timers/active').then(response => {
                    if (response.data.id !== undefined) {
                        this.startTimer(response.data.task, response.data)
                    }
                })
            })
        },
        methods: {
            /**
             * Conditionally pads a number with "0"
             */
            _padNumber: number => (number > 9 || number === 0) ? number : "0" + number,

            /**
             * Splits seconds into hours, minutes, and seconds.
             */
            _readableTimeFromSeconds: function (seconds) {
                const hours = 3600 > seconds ? 0 : parseInt(seconds / 3600, 10)
                return {
                    hours: this._padNumber(hours),
                    seconds: this._padNumber(seconds % 60),
                    minutes: this._padNumber(parseInt(seconds / 60, 10) % 60),
                }
            },

            /**
             * Calculate the amount of time spent on the task using the timer object.
             */
            calculateTimeSpent: function (timer) {
                if (timer.stopped_at) {
                    const started = moment(timer.started_at)
                    const stopped = moment(timer.stopped_at)
                    const time = this._readableTimeFromSeconds(
                        parseInt(moment.duration(stopped.diff(started)).asSeconds())
                    )
                    return `${time.hours} Hours | ${time.minutes} mins | ${time.seconds} seconds`
                }
                return ''
            },

            /**
             * Determines if there is an active timer and whether it belongs to the task
             * passed into the function.
             */
            showTimerForTask: function (task, timer) {
                return this.counter.timer &&
                    this.counter.timer.id === timer.id &&
                    this.counter.timer.task.id === task.id
            },

            /**
             * Start counting the timer. Tick tock.
             */
            startTimer: function (task, timer) {
                const started = moment(timer.started_at)

                this.counter.timer = timer
                this.counter.timer.task = task
                this.counter.seconds = parseInt(moment.duration(moment().diff(started)).asSeconds())
                this.counter.ticker = setInterval(() => {
                    const time = this._readableTimeFromSeconds(++vm.counter.seconds)

                    this.activeTimerString = `${time.hours} Hours | ${time.minutes}:${time.seconds}`
                }, 1000)
            },

            /**
             * Stop the timer from the API and then from the local counter.
             */
            stopTimer: function () {
                window.axios.post(`/tasks/${this.counter.timer.id}/timers/stop`)
                    .then(response => {
                        // Loop through the tasks and get the right task...
                        this.tasks.forEach(task => {
                            if (task.id === parseInt(this.counter.timer.task.id)) {
                                // Loop through the timers of the task and set the `stopped_at` time
                                return task.timers.forEach(timer => {
                                    if (timer.id === parseInt(this.counter.timer.id)) {
                                        return timer.stopped_at = response.data.stopped_at
                                    }
                                })
                            }
                        });

                        // Stop the ticker
                        clearInterval(this.counter.ticker)

                        // Reset the counter and timer string
                        this.counter = {
                            seconds: 0,
                            timer: null
                        }
                        this.activeTimerString = 'Calculating...'
                    })
            },

            /**
             * Create a new timer.
             */
            createTimer: function (task) {
                window.axios.post(`/tasks/${task.id}/timers`, {
                        name: this.newTimerName
                    })
                    .then(response => {
                        task.timers.push(response.data)
                        this.startTimer(response.data.task, response.data)
                    })

                this.newTimerName = ''
            },
        },
    }

</script>
