<?php

/*
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * The software is based on the Axon Framework project which is
 * licensed under the Apache 2.0 license. For more information on the Axon Framework
 * see <http://www.axonframework.org/>.
 * 
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the MIT license. For more information, see
 * <http://www.governor-framework.org/>.
 */

namespace Governor\Framework\EventHandling;

use Governor\Framework\Domain\MetaData;
use Governor\Framework\Domain\EventMessageInterface;

/**
 * A cluster represents a group of Event Listeners that are treated as a single group by the {@link
 * ClusteringEventBus}. This allows attributes and behavior (e.g. transaction management, asynchronous processing,
 * distribution) to be applied over a whole group at once.
 *
 * @author    "David Kalosi" <david.kalosi@gmail.com>
 * @license   <a href="http://www.opensource.org/licenses/mit-license.php">MIT License</a>
 */
interface ClusterInterface extends EventProcessingMonitorSupportInterface
{

    /**
     * Returns the name of this cluster. This name is used to detect distributed instances of the
     * same cluster. Multiple instances referring to the same logical cluster (on different JVM's) must have the same
     * name.
     *
     * @return string The name of this cluster.
     */
    public function getName();

    /**
     * Publishes the given Events to the members of this cluster.
     *
     * @param EventMessageInterface[] $events The Events to publish in the cluster
     */
    public function publish(array $events);

    /**
     * Returns the MetaData of this Cluster.
     *
     * @return MetaData MetaData of this Cluster
     */
    public function getMetaData();

    /**
     * Subscribes the EventBusInterface to this cluster.
     *
     * @param EventBusInterface $eventBus
     */
    public function subscribe(EventBusInterface $eventBus);

    /**
     * Unsubscribes the EventBusInterface from this cluster.
     *
     * @param EventBusInterface $eventBus
     */
    public function unsubscribe(EventBusInterface $eventBus);

    /**
     * @return EventBusInterface[]
     */
    public function getMembers();
}
