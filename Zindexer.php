<?php
require 'vendor/autoload.php';
use Elasticsearch\ClientBuilder;

class Zindexer {
  private $client = null;
  private $index = null;
  private $type = null;
  private $basicParameters = [];

  public function __construct()
  {
    if ($this->client === null) {
      //$this->client = ClientBuilder();
      $this->client = ClientBuilder::create()
      ->setHosts(['localhost'])
      ->build();
    }
  }
  public function createIndex($params)
  {
    return $this->client->indices()->create($params);
  }

  public function deleteIndex($params)
  {
    return $this->client->indices()->delete($params);
  }

  public function indexExists($index)
  {
    return  $this->client->indices()->exists([
      'index'=> $index
    ]);
  }
  /*


  public function setIndex($index)
  {
    $this->index = $index;
    $this->basicParameters['index'] = $index;
  }
  public function setType($type)
  {
    $this->type = $type;
    $this->basicParameters['type'] = $type;
  }*/
  public function indexById($params)
  {
    return $this->client->index($params);
  }
  public function getById($params)
  {
    return $this->client->get($params);
  }
  /**
  * it's an upsert
  **/
  public function updateById($params)
  {
    return $this->client->update($params);
  }
  public function deleteById($params)
  {
    return $this->client->delete($params);
  }
  /**
  *
  **/
  public function searchByMatchQuery($params)
  {
    return $this->client->search($params);
  }
  public function getAllDocuments($params)
  {
    return $this->client->search($params);
  }
}
