<?php

use PHPUnit\Framework\TestCase;

class CollectionTest extends TestCase
{
    /** @test */
    public function empty_instantiated_collection_returns_no_items()
    {
        $collection = new \App\Support\Collection;

        $this->assertEmpty($collection->get());
    }

    /** @test */
    public function count_is_correct_for_items_passed_in()
    {
        $collection = new App\Support\Collection([
            'one', 'two', 'three'
        ]);

        $this->assertSame(3, $collection->count());
    }

    /** @test */
    public function items_returned_match_items_passed_in()
    {
        $collection = new App\Support\Collection([
            'one', 'two'
        ]);

        $this->assertCount(2, $collection->get());
        $this->assertSame($collection->get()[0], 'one');
        $this->assertSame($collection->get()[1], 'two');
    }

    /** @test */
    public function collection_is_iterable()
    {
        $collection = new App\Support\Collection;
        $this->assertInstanceOf(IteratorAggregate::class, $collection);
    }

    /** @test */
    public function collection_can_be_iterated()
    {
        $collection = new App\Support\Collection([
            'one', 'two', 'three'
        ]);

        $items = [];

        foreach ($collection as $item) {
            $items[] = $item;
        }

        $this->assertCount(3, $items);
        $this->assertInstanceOf(ArrayIterator::class, $collection->getIterator());
    }

    /** @test */
    public function collection_can_be_merged_with_another_collection()
    {
        $collection1 = new App\Support\Collection([
            'one', 'two'
        ]);

        $collection2 = new App\Support\Collection([
            'three', 'four', 'five'
        ]);

        $collection1->merge($collection2);

        $this->assertCount(5, $collection1->get());
        $this->assertSame($collection1->get(), ['one', 'two', 'three', 'four', 'five']);
    }

    /** @test */
    public function can_add_to_existing_collection()
    {
        $collection = new App\Support\Collection([
            'one', 'two'
        ]);

        $collection->add(['three']);

        $this->assertCount(3, $collection);
        $this->assertSame($collection->get(), ['one', 'two', 'three']);
    }

    /** @test */
    public function returns_json_encoded_items()
    {
        $array = [
            'username' => 'Vitalik',
            'password' => '123123123'
        ];
        $collection = new App\Support\Collection($array);

        $json = $collection->toJson();

        $this->assertSame($json, json_encode($array));
    }

    /** @test */
    public function json_encoding_a_collection_object_returns_json()
    {
        $array = [
            'username' => 'Vitalik',
            'password' => '123123123'
        ];
        $collection = new App\Support\Collection($array);

        $encoded = json_encode($collection);

        $this->assertInternalType('string', $encoded);
        $this->assertSame('{"username":"Vitalik","password":"123123123"}', $encoded);
    }

    /** @test */
    public function check_if_multiple_collection_can_be_jsoned()
    {
        $array1 = [
            'username' => 'Vitalik',
            'password' => '123123123'
        ];

        $collection1 = new App\Support\Collection($array1);

        $array2 = [
            'username' => 'Nevadskiy',
            'password' => '123123123'
        ];
        $collection2 = new App\Support\Collection($array2);

        $encoded = json_encode([$collection1, $collection2]);

        $this->assertSame(
            '[{"username":"Vitalik","password":"123123123"},'.
            '{"username":"Nevadskiy","password":"123123123"}]',
            $encoded
        );
    }
}
