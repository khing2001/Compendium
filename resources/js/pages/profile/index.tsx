import { PlaceholderPattern } from '@/components/ui/placeholder-pattern';
import AppLayout from '@/layouts/app-layout';
import { dashboard } from '@/routes';
import { type BreadcrumbItem } from '@/types';
import { Head, Link, router } from '@inertiajs/react';
import { useState } from 'react';
import { Card, CardHeader, CardTitle, CardContent } from '@/components/ui/card';
import { Button } from '@/components/ui/button';
import { CheckCircle, Route } from 'lucide-react';
//import { Props } from 'node_modules/@headlessui/react/dist/types';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Progress',
        href: '/progress',
    },
];
type Props = {
    current?: {
        name: string;
        id: number;
    };
};

export default function Index({current}: Props) {
    const [isEditing, setIsEditing] = useState(false);
    const [currentName, setCurrentName] = useState(current?.name || "");
    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Progress" />
            <div className="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-4">
                <div className='rounded-xl border-4 bg-red-900 p-4 w-auto h-40'> {/* FOR CURRENT PROGRESS BOX HEADER */}
                    <div className='h-20 font-bold text-4xl justify-center mt-4'>
                        {!isEditing ? (
                            <button onClick={() => setIsEditing(true)}>
                                {currentName || '[Click to add current progress]'}
                            </button>
                        ) : (
                            <input
                                autoFocus
                                className="border p-2 rounded text-black"
                                value={currentName}
                                onChange={(e) => setCurrentName(e.target.value)}
                                onBlur={() => {
                                    setIsEditing(false);
                                    router.post('/progress/update-current-progress', { name: currentName });
                                }}
                                onKeyDown={(e) => {
                                    if (e.key === 'Enter') {
                                        setIsEditing(false);
                                        router.post('/progress/update-current-progress', { name: currentName });
                                    }
                                }}
                            />
                        )}
                    </div>
                    <div className='gap-x-4 text-left -mt-4 ml-2'>
                        <Link href={"/progress/complete"}>
                            <Button>Completed</Button>
                        </Link>

                    </div>
                    
                </div>
            </div>
            <div className='p-4'>
                <h1>Accomplished Tasks</h1>
            </div>
        </AppLayout>
    );
}
