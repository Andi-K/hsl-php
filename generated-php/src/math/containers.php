<?php
/*
 *  Copyright (c) 2004-present, Facebook, Inc.
 *  All rights reserved.
 *
 *  This source code is licensed under the MIT license found in the
 *  LICENSE file in the root directory of this source tree.
 *
 */
namespace HH\Lib\Math;

use HH\Lib\{C, Math, Vec};
/**
 * @psalm-template T as \num
 *
 * @param iterable<mixed, T> $numbers
 *
 * @return null|T
 */
function max(iterable $numbers)
{
    $max = null;
    foreach ($numbers as $number) {
        if ($max === null || $number > $max) {
            $max = $number;
        }
    }
    return $max;
}
/**
 * @psalm-template T
 *
 * @param iterable<mixed, T> $traversable
 * @param \Closure(T):\num $num_func
 *
 * @return null|T
 */
function max_by(iterable $traversable, \Closure $num_func)
{
    $max = null;
    $max_num = null;
    foreach ($traversable as $value) {
        $value_num = $num_func($value);
        if ($max_num === null || $value_num >= $max_num) {
            $max = $value;
            $max_num = $value_num;
        }
    }
    return $max;
}
/**
 * @param Container<\num> $numbers
 *
 * @return null|float
 */
function mean(Container $numbers)
{
    $count = (double) \count($numbers);
    if ($count === 0.0) {
        return null;
    }
    $mean = 0.0;
    foreach ($numbers as $number) {
        $mean += $number / $count;
    }
    return $mean;
}
/**
 * @param Container<\num> $numbers
 *
 * @return null|float
 */
function median(Container $numbers)
{
    $numbers = Vec\sort($numbers);
    $count = \count($numbers);
    if ($count === 0) {
        return null;
    }
    $middle_index = Math\int_div($count, 2);
    if ($count % 2 === 0) {
        return Math\mean([$numbers[$middle_index], $numbers[$middle_index - 1]]) ?? 0.0;
    }
    return (double) $numbers[$middle_index];
}
/**
 * @psalm-template T as \num
 *
 * @param iterable<mixed, T> $numbers
 *
 * @return null|T
 */
function min(iterable $numbers)
{
    $min = null;
    foreach ($numbers as $number) {
        if ($min === null || $number < $min) {
            $min = $number;
        }
    }
    return $min;
}
/**
 * @psalm-template T
 *
 * @param iterable<mixed, T> $traversable
 * @param \Closure(T):\num $num_func
 *
 * @return null|T
 */
function min_by(iterable $traversable, \Closure $num_func)
{
    $min = null;
    $min_num = null;
    foreach ($traversable as $value) {
        $value_num = $num_func($value);
        if ($min_num === null || $value_num <= $min_num) {
            $min = $value;
            $min_num = $value_num;
        }
    }
    return $min;
}
/**
 * @param iterable<mixed, int> $traversable
 *
 * @return int
 */
function sum(iterable $traversable)
{
    $result = 0;
    foreach ($traversable as $value) {
        $result += $value;
    }
    return $result;
}
/**
 * @psalm-template T as \num
 *
 * @param iterable<mixed, T> $traversable
 *
 * @return float
 */
function sum_float(iterable $traversable)
{
    $result = 0.0;
    foreach ($traversable as $value) {
        $result += $value;
    }
    return $result;
}

