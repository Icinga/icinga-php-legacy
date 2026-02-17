<?php

namespace gipfl\SimpleDaemon;

use React\EventLoop\LoopInterface;
use React\Promise\PromiseInterface;

interface DaemonTask
{
    /**
     * @param LoopInterface $loop
     * @return PromiseInterface
     */
    public function start(LoopInterface $loop);

    /**
     * @return PromiseInterface
     */
    public function stop();
}
