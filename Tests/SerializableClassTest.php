<?php

namespace Metaregistrar\Api\Client\Tests;

use Metaregistrar\Api\Client\Fragment\Contact\Addr as ContactAddr;
use Metaregistrar\Api\Client\Fragment\Contact\Contact;
use Metaregistrar\Api\Client\Fragment\Contact\ContactProperty;
use Metaregistrar\Api\Client\Fragment\Contact\PostalInfo;
use Metaregistrar\Api\Client\Fragment\Dns\Content;
use Metaregistrar\Api\Client\Fragment\Dns\DsData;
use Metaregistrar\Api\Client\Fragment\Dns\KeyData;
use Metaregistrar\Api\Client\Fragment\Dns\Zone;
use Metaregistrar\Api\Client\Fragment\Domain\Add;
use Metaregistrar\Api\Client\Fragment\Domain\CheckResult;
use Metaregistrar\Api\Client\Fragment\Domain\Chg;
use Metaregistrar\Api\Client\Fragment\Domain\Domain;
use Metaregistrar\Api\Client\Fragment\Domain\DomainContact;
use Metaregistrar\Api\Client\Fragment\Domain\DomainHost;
use Metaregistrar\Api\Client\Fragment\Domain\DomainTransfer;
use Metaregistrar\Api\Client\Fragment\Domain\Rem;
use Metaregistrar\Api\Client\Fragment\Domain\SecDnsKeyData;
use Metaregistrar\Api\Client\Fragment\Host\Addr as HostAddr;
use Metaregistrar\Api\Client\Fragment\Host\Host;
use Metaregistrar\Api\Client\Fragment\PollMessage;
use Metaregistrar\Api\Client\Request\DomainCheckRequest;
use Metaregistrar\Api\Client\Tests\TestTools\ModelTestCase;

class SerializableClassTest extends ModelTestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    public function provideSerializableClasses(): array
    {
        $fragment = [
            [
                'namespace' => 'Metaregistrar\\Api\\Client\\Fragment\\',
                'path' => __DIR__ . '/../src/Fragment/',
            ]
        ];

        $subDirectories = $this->getSubdirectories($fragment);

        $directories = [
            ...$fragment,
            ...$subDirectories,
            [
                'namespace' => 'Metaregistrar\\Api\\Client\\Request\\',
                'path' => __DIR__ . '/../src/Request/',
            ],
            [
                'namespace' => 'Metaregistrar\\Api\\Client\\Response\\',
                'path' => __DIR__ . '/../src/Response/',
            ]
        ];

        return $this->getSerializableClassFiles($directories);
    }

    /**
     * @dataProvider provideSerializableClasses
     * @testdox it validates when serialized object is equal to new object populated using setters
     */
    public function testSerializableClass($className): void
    {
        $this->assertSerializableClass($className);
    }

    protected function getDefaultValues(): array
    {
        $keyData = new KeyData();
        $keyData->setProtocol('http');
        $keyData->setPubKey('pubkey');
        $keyData->setFlags('green');
        $keyData->setAlg('alg');

        $zone = new Zone();
        $zone->setPremium(true);
        $zone->setName('super Zone');
        $zone->setKeyData([$keyData]);

        $pollMessage = new PollMessage();
        $pollMessage->setMessage('ping');
        $pollMessage->setPollData(['not today']);

        $postAddr = new ContactAddr();
        $postAddr->setCity('premium');
        $postAddr->setCc('abuse@example.com');

        $postalInfo = new PostalInfo();
        $postalInfo->setName('primary');
        $postalInfo->setOrg('MTR');
        $postalInfo->setAddr($postAddr);

        $contact = new Contact();
        $contact->setStatus(['new']);
        $contact->setCrmId('crm-id');
        $contact->setEmail('info@exmaple.com');
        $contact->setPostalInfo($postalInfo);


        return [
            'DateTime' => new \DateTime(), // ignored
            'Metaregistrar\Api\Client\Fragment\Contact\Addr' => $postAddr,
            'Metaregistrar\Api\Client\Fragment\Contact\Contact' => $contact,
            'Metaregistrar\Api\Client\Fragment\Contact\PostalInfo' => $postalInfo,
            'Metaregistrar\Api\Client\Fragment\Dns\KeyData' => $keyData,
            'Metaregistrar\Api\Client\Fragment\Dns\Zone' => $zone,
            'Metaregistrar\Api\Client\Fragment\Domain\Add' => (new Add())->setNameservers(['pri.mary', 'sec.ondary']),
            'Metaregistrar\Api\Client\Fragment\Domain\Chg' => (new Chg())->setRegistrant('test user A'),
            'Metaregistrar\Api\Client\Fragment\Domain\Domain' => (new Domain())->setName('test-domain.ai'),
            'Metaregistrar\Api\Client\Fragment\Domain\DomainTransfer' => (new DomainTransfer())->setName('transfer.me'),
            'Metaregistrar\Api\Client\Fragment\Domain\Rem' => (new Rem())->setStatus(['provisioning']),
            'Metaregistrar\Api\Client\Fragment\Host\Host' => (new Host())->setRoid('ro-id-1'),
            'Metaregistrar\Api\Client\Request\DomainCheckRequest"' => (new DomainCheckRequest())->setName(['poll 123']),
            'Metaregistrar\EPPLanguageBundle\Messages\Extension\SecDns\SecDnsKeyData' => (new SecDnsKeyData())->setPubKey('pub_1234567890'),
            'array' => ['a', 'b', 'c'],
            'array<Metaregistrar\Api\Client\Fragment\Contact\ContactProperty>' => [(new ContactProperty())->setRegistry('MTR')],
            'array<Metaregistrar\Api\Client\Fragment\Dns\Content>' => [(new Content())->setType('dnsType')],
            'array<Metaregistrar\Api\Client\Fragment\Dns\DsData>' => [(new DsData())->setDigest('setDigest')->setKeytag('label')],
            'array<Metaregistrar\Api\Client\Fragment\Dns\KeyData>' => [$keyData],
            'array<Metaregistrar\Api\Client\Fragment\Domain\CheckResult>' => [(new CheckResult())->setReason('really good')],
            'array<Metaregistrar\Api\Client\Fragment\Domain\DomainContact>' => [new DomainContact(10, 'public')],
            'array<Metaregistrar\Api\Client\Fragment\Domain\DomainHost>' => [(new DomainHost())->setName('www.com')],
            'array<Metaregistrar\Api\Client\Fragment\Domain\SecDnsKeyData>' => [(new SecDnsKeyData())->setProtocol('TCP')],
            'array<Metaregistrar\Api\Client\Fragment\Host\Addr>' => [(new HostAddr())->setIpAddress('123.456.789.981')],
            'array<Metaregistrar\Api\Client\Fragment\PollMessage>' => [$pollMessage],
            'array<integer>' => [1, 2, 101, -1],
            'array<string>' => ['abc', 'def'],
            'boolean' => false,
            'float' => 3.14,
            'integer' => 101,
            'string' => 'a value for testing',
        ];
    }

    protected function getIgnoreClasses(): array
    {
        return [];
    }

    protected function getIgnoreMethods(): array
    {
        return ['getCrDate', 'getUpDate', 'getExDate'];
    }

    protected function getIgnoreProperties(): array
    {
        return [
//            'Metaregistrar\\Api\\Client\\Fragment\\Domain\\Domain' => ['crDate', 'upDate', 'exDate'],
        ];
    }
}